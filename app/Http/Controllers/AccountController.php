<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Mail\VerifyAccountMail;
use Mail;
use Hash;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:accounts',
            'cardNumber'=>'required|size:10',
            'cvv'=>'required|size:3',
            'password'=>'required',
        ]);
        $formData = $request->all('name','email','cardNumber','cvv','password');
        $formData['password'] = bcrypt($formData['password']);
        
        if(Account::create($formData)){
            $token = \Str::random(50);
            $verifyPass = [
                'email' => $request->email,
                'token' => $token
            ];
            PasswordReset::create($verifyPass);
            Mail::to($request->email)->send(new VerifyAccountMail($request->name,$request->email,$token));
            return redirect()->route('home.verify')->with('yes','Hãy xác thực email để hoàn thành đăng ký');
        }
        return redirect()->back()->with('no', 'Đăng ký không thành công, hãy thử đăng ký lại thông tin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     
    // public function login(){
    //     return view('login');
    // }

    // public function signin(Request $req){

    //     $acc = Account::isAccountQueryByEmail($req->email)->first();
    //     if($acc){
    //         if($acc->password == $req->password){
    //             return redirect()->route('home.main');
    //         }else{
    //             $err = 'Mật khẩu của bạn không đúng';  
    //             return view('login',compact('err'));
    //         }
    //     }else{
    //         $err = 'Tài khoản của bạn không tồn tại';  
    //         return view('login',compact('err'));
    //     }
    // }
}
