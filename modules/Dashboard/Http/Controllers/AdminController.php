<?php
namespace HPro\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Session;
class AdminController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        // $this->middleware('auth');
    }

    public function index(Request $request){
        return view('Dashboard::home.home');
    }

    public function getLogin(Request $request){

        if(Auth::check()){
            return redirect()->back();
        }else
        return view('Dashboard::login.login');
    }

    public function postLogin(Request $request){

        $login = [
                        'email' => $request->input('email'),
                        'password' => $request->input('password'),
                    ];
        
        if (Auth::guard()->attempt($login , $request->has('remember'))) {
            return redirect()->route('home.admin');
        }else{
            $request->session()->flash('alert','Nhập sai Email hoặc Mật khẩu!');
            return redirect()->back();
        }
    }

    public function getSign(Request $request)
    {
        return view('Dashboard::login.sign');
    }

    public function postSign(Request $request)
    {
        $data = new User();
        $data->email = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->save();

        return redirect()->route('get.login.admin');
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('get.login.admin');
    }

}