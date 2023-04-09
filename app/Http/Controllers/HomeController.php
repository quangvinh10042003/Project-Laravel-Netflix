<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Film;
use App\Models\Release_date;
use App\Models\Ticket;
use App\Models\Timeline;
use App\Mail\VerifyAccountMail;
use App\Mail\VerifyForgotPassword;
use App\Models\PasswordReset;
use Auth;
use Mail;
use Hash;
use App\Helper\Cart;
class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function signup(){
        return view('signup');
    }
    public function main(){
        $films = Film::all();
        return view('main', compact('films'));
    }
    public function detail($idFilm){
        $film = Film::find($idFilm);
        $release_dates = Release_date::orderBy('id','asc')->paginate(4);
        $today =  date("Y-m-d");
        $curReleaseDate = Release_date::isDateQueryByDate("$today")->first();
        $idDate = $curReleaseDate->id;
        $timelines = Timeline::where([
            ['film_id','=',$idFilm],
            ['release_id','=',$curReleaseDate->id]
        ])->get();
      
        return view('detail', compact('film','release_dates','timelines','idDate'));
    }
    public function detailDate($idFilm, $idDate){
        $film = Film::find($idFilm);
        
        $release_dates = Release_date::orderBy('id','asc')->paginate(4);
        $curReleaseDate = Release_date::isDateQueryById("$idDate")->first();
        $timelines = Timeline::isTimelineQueryByFilmDateId($idFilm,$curReleaseDate->id)->orderBy('timeline','ASC')->get();
        
        return view('detail', compact('film','release_dates','timelines','idDate'));
    }
    public function ticket($idFilm, $idDate, $idTimeline){
        $film = Film::find($idFilm);
        $release_dates = Release_date::orderBy('id','asc')->paginate(4);
        // dd($idDate);
        $curReleaseDate = Release_date::isDateQueryById("$idDate")->first();

        $timelines = Timeline::isTimelineQueryByFilmDateId($idFilm, $curReleaseDate->id)->get();

        $tickets = Ticket::isTicketQueryByFilmTimelineId($idFilm,$idTimeline)->get();
        $thisTimeline = Timeline::isTimeline($idTimeline);
        return view('ticket', compact('film','release_dates','timelines','idDate','idTimeline','tickets','thisTimeline'));
    }
    public function getTicket(Request $request, Cart $cart){
        $formData = $request->all('arr','film_id','timeline_id');
        $arrNumber = json_decode($formData['arr']);
        $chair = '';
        foreach ($arrNumber as $key => $value) {
            if(count($arrNumber) - $key == 1){
                $chair .= $value;
            }else {
                $chair .= $value." - ";
            }
        }    
        $quantity = count($arrNumber);                   
        if(!empty($formData['arr'])){
            $film = Film::find($formData['film_id']);
            $timeline = Timeline::isTimeline($formData['timeline_id']);
            return view('checkout', compact('formData','film','timeline','chair','quantity'));
        }else{
            return redirect()->back()->with('no','Bạn chưa lựa chọn chỗ ngồi');
        }
    }
    public function login(){
        return view('login');
    }
    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = Auth::guard('acc')->attempt($form_data, $req->has('remember'));

       if ($check) {
            if (auth('acc')->user()->email_verified_at != null) {
                return redirect()->route('home.main')->with('yes', 'Chào mừng trở lại');
            }
            return redirect()->back()->with('no', 'Bạn chưa kích hoạt tài khoản');
       }else{
            return redirect()->back()->with('no', 'Tài khoản hoặc mật khảu không chính xác');
       }
    }
    
    public function logout()
    {
        Auth::guard('acc')->logout();
        return redirect()->route('home.login')->with('yes', 'Đăng xuất thành công, vui lòng đăng nhập lại');
    }
    public function update_profile(){
        $auth = auth('acc')->user();
        request()->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$auth->id, 
            ],
            'cardNumber'=>'required|size:10',
            'cvv'=>'required|size:3',
            'password' => [
                'required',
                function($attribute, $value, $fail) use($auth) {
                    if (!Hash::check(request()->password, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ]
        ]);
        $form_data = request()->only('name','email');
        if ($auth->update($form_data)) {
            return redirect()->back()->with('yes', 'Cập nhật profile thành công');
        }else{

            return redirect()->back()->with('no', 'Cập nhật profile không thành công');
        }
    }
    public function change_password()
    {
        return view('change_password');
    }
   
    public function update_password(Request $req)
    {
        $auth = auth('acc')->user();
        $req->validate([
            'old_password' => [
                'required',
                function($attribute, $value, $fail) use($req, $auth) {
                    if (!Hash::check($req->old_password, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ],
            'new_password' => 'required|different:old_password',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $form_data = [
            'password' => bcrypt($req->new_password)
        ];

        if ($auth->update($form_data)) {
            auth('acc')->logout();
            return redirect()->route('home.login')->with('yes', 'Cập nhật mật khẩu thành công');
        }

        return redirect()->back()->with('no', 'Cập nhật mật khẩu không thành công');
    }
    public function verify(){
        return view('verify');
    }
    public function verifyAccount($token)
    {
       $info = PasswordReset::where('token', $token)->firstOrFail();
       $account = Account::where('email', $info->email)->firstOrFail();
       $check = $account->update([
            'email_verified_at' => date('Y-m-d H:i:s')
       ]);

       if ($check) {
            PasswordReset::where('token', $token)->delete();
            return redirect()->route('home.login')->with('yes', 'Kích hoạt tài khoản thành công, ban có thể đăng nhập');
       }

        return redirect()->route('home.register')->with('no', 'Kích hoạt tài khoản không thành công');

    }
    public function forgetPassword(){
        return view('forgetPassword');
    }
    public function takeEmailForget()
    {
        $account = Account::where('email', request('email'))->first();
        if($account){
            $name = $account->name;
            $token = \Str::random(50);
            $verifyPass = [
                'email' => request('email'),
                'token' => $token
            ];
            PasswordReset::create($verifyPass);
            Mail::to(request('email'))->send(new VerifyForgotPassword($name,request('email'),$token));
            return redirect()->route('home.verify')->with('yes','Hãy xác thực email để hoàn thành đăng ký');
        }else{
            return redirect()->back()->with('no','Tài khoản email của bạn không tồn tại.');
        }
        
    }
    public function verifyAccountForget($token)
    {
        $info = PasswordReset::where('token', $token)->firstOrFail();
        $account = Account::where('email', $info->email)->firstOrFail();
        PasswordReset::where('token', $token)->delete();
        return redirect()->route('home.resetPassword',$account->id)->with('yes', 'Xác thực email thành công. Hãy cập nhật mật khẩu mới');
    }
    public function resetPassword(Account $account){

        return view('resetPassword', compact('account'));
    }
    public function setNewPassword(){
        request()->validate([
            'newPassword' =>'required',
            'confirmPassword' =>'required|same:newPassword'
        ]);
        if($account = Account::where('id', request('id'))->update(['password' =>  bcrypt(request('newPassword'))])){
            return redirect()->route('home.login')->with('yes', 'Lấy lại mật khẩu thành công');
        }
        return redirect()->back()->with('no','Lấy lại mật khẩu không thành công');
    }
   
}