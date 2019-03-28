<?php
namespace HPro\Home\Http\Controllers;

use HPro\Home\Enities\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AccountController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Member $model, Request $request)
    {
        $this->model    = $model;
    }

    public function getCreate(Request $request){
        return view('Home::home.signup');
    }

    public function postCreate(Request $request){

        
        
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        unset($request->password);
        $insert = new Member($data);
        $insert->save();



        $request->session()->flash('status', 'Tạo tài khoản thành công!');
        return redirect()->route('get.home.index');
    }


    // public function getEditProfile(Request $request, $id)
    // {
    //     $data = User::find($id);
    //     $event = Event::where('user_id',$data->id)->orderBy('created_at','DESC')->get();
    //     return view('Home::profile.profile',compact('data','event'));
    // }

    // public function postEditProfile(Request $request, $id){
    //     $this->validate($request,[
    //         'name'        => 'required',
    //         'phone'       => 'required|numeric|unique:users,phone,' . $id,
    //         'email'       => 'required|e-mail|unique:users,email,' . $id,
    //     ],[
    //         'name.required'     =>   'Vui lòng nhập tên của bạn',
    //         'phone.unique'      =>   'Số điện thoại của bạn dường như đã được sử dụng!',
    //         'phone.numeric'     =>   'Số điện thoại của bạn không đúng định dạng!',
    //         'email.unique'      =>   'Email của bạn dường như đã được sử dụng!',
    //         'email.e-mail'      =>   'Vui lòng nhập đúng địa chỉ email!',
    //     ]);

    //     $data = User::find($id);
    //     $data->update($request->all());
    //     // $data->password = bcrypt($request->input('password'));
    //     // $data->update();
    //     $request->session()->flash('status', 'Chỉnh sửa thành công!');
    //     return redirect()->back();
    // }

    // public function getListEventProfile(Request $request, $id)
    // {
    //     $data = User::find($id);
    //     $event = Event::where('user_id',$data->id)->orderBy('created_at','DESC')->paginate(3);
    //     return view('Home::profile.event_list_profile',compact('data','event'));
    // }


   
}