<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required'
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email bạn nhập không chính xác',
            'password.required'=>'Bạn chưa nhập mật khẩu'
        ]);

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            if(Auth::user()->quyen == 0){
                return redirect('home');
            } elseif(Auth::user()->quyen == 1){
                return redirect('admin/user/list');
            } elseif(Auth::user()->quyen == 2){
                return redirect('qlts/xulyhoso/listhoso');
            }

        } else{
            return redirect('login')->with('thongbao','Email hoặc mật khẩu bạn nhập không đúng');
        }
    }

    public function getSignin(){
        return view('signin');
    }

    public function postSignin(Request $request){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required|min:3|max:30',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email bạn nhập không chính xác',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu tối đa 30 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại không chính xác'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;

        $user->save();

        return redirect('login')->with('thongbao','Bạn đã đăng kí sinh viên thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    //Xem danh sách tài khoản user
    public function getlist(){
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }

    //Thêm tài khoản user
    public function getadd(){
        return view('admin.user.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'passwordAgain'=>'required|same:password',
            'quyen'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên người dùng phải ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email bạn nhập không đúng',
            'email.unique'=>'Tài khoản email này đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'passwordAgain.same'=>'Mật khẩu bạn nhập lại chưa đúng',
            'quyen.required'=>'Bạn chưa chọn quyền'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;

        $user->save();
        return redirect('admin/user/add')->with('thongbao','Bạn đã thêm user thành công');
    }

    public function getedit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function postedit(Request $request,$id){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'quyen'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên người dùng phải ít nhất 3 kí tự',
            'quyen.required'=>'Bạn chưa chọn quyền'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;

        if($request->changePassword == "on"){
            $this->validate($request,
        [
            'password'=>'required',
            'passwordAgain'=>'required|same:password',
        ],
        [
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'passwordAgain.same'=>'Mật khẩu bạn nhập lại chưa đúng',
        ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('admin/user/edit/'.$id)->with('thongbao','Bạn đã sửa user thành công');
    }

    public function getdelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('thongbao','Bạn đã xóa user thành công');
    }
}
