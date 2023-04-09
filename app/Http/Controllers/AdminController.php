<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Film;
use App\Models\Release_date;
use App\Models\Ticket;
use App\Models\Timeline;
use Hash;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function films(){
        $list = Film::orderBy('id','desc')->get();
        if(request('keyword')){
           
            $list = Film::search();
        }
        return view('admin.films',compact('list'));
    }
    public function addrd(Request $request)
    {
        $formData = $request->all('release_date');
        try {
            Release_date::create($formData);
            return redirect()->back()->with('yes','Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Thêm mới không thành công');
            //throw $th;
        }
    }
    public function login()
    {
        return view('admin/login'); 
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = auth()->attempt($form_data, $req->has('remember'));
       if ($check) {
            return redirect()->route('admin.index')->with('yes', 'Chào mừng trở lại');
       }else{
        return redirect()->back()->with('no', 'Tài khoản hoặc mật khảu không chính xác');
       }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('yes', 'Đăng xuất thành công, vui lòng đăng nhập lại');
    }
    public function profile()
    {
        $auth = auth()->user();
        return view('admin.profile', compact('auth'));
    }


    public function update_profile(Request $req)
    {
        $auth = auth()->user();
        $req->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$auth->id, 
            ],
            'password' => [
                'required',
                function($attribute, $value, $fail) use($req, $auth) {
                    if (!Hash::check($req->password, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ]
        ]);
        $form_data = $req->only('name','email');
        if ($auth->update($form_data)) {
            return redirect()->back()->with('yes', 'Cập nhật profile thành công');
        }else{
            dd('đéo ổn r');
            return redirect()->back()->with('no', 'Cập nhật profile không thành công');
        }
    }

    public function change_password()
    {
        return view('admin.change_password');
    }

    public function update_password(Request $req)
    {
        $auth = auth()->user();
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
            auth()->logout();
            return redirect()->route('admin.login')->with('yes', 'Cập nhật mật khẩu thành công');
        }

        return redirect()->back()->with('no', 'Cập nhật mật khẩu không thành công');
    }
}
