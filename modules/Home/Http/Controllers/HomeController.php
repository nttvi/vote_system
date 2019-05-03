<?php
namespace HPro\Home\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->model    = $model;
    }
    
    
    public function getHome(Request $request){
        return view('Home::home.home');
    }

    public function getHomeLogin(Request $request){
        if(Auth::check()){
            return redirect()->back();
        }else
            return view('Home::home.login');
    }

    public function postHomeLogin(Request $request){

        $login = [
                        'email' => $request->input('account'),
                        'password' => $request->input('password'),
                    ];
        
        if (Auth::guard('member')->attempt($login)) {
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function getHomeLogout(Request $request){
        Auth::guard('member')->logout();
        return redirect()->route('get.home.index');
    }

   public function getCreateBauChon(Request $request)
   {
        return view('Home::election.home_create_election');
   }

   
}