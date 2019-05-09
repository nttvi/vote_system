<?php
namespace HPro\Home\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\Auth;
use HPro\Category\Enities\Election_type;
use HPro\Election\Enities\Election;
use HPro\Object\Enities\Objects;

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
        $type = Election_type::get();
        return view('Home::election.home_create_election',compact('type'));
    }

   public function postCreateBauChon(Request $request)
   {
        $data = $request->all();
        unset($data['object']);
        $data['slug'] = slug($request->title); 
        $data['member_id'] = Auth::guard('member')->id(); 
        $election = new Election($data);
        $election->save();

        $objects = $request->object;
        foreach ($objects as $key => $val) {
            $obj = new Objects();
            $obj->title = $val; 
            $obj->election_id = $election->id; 
            $obj->save();
        }

        return redirect()->route('get.home.getEditBauChon',$election->id,slug($request->title));
   }

   public function getEditBauChon(Request $request, $id, $slug)
    {
        $data = Election::find($id);
        $type = Election_type::get();
        return view('Home::election.home_edit_election',compact('type','data'));
    }
   
    public function postCreateDoiTuong(Request $request){

        $data = $request->all();
        $insert = new Objects($data);

        if($request->file('image')){
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('upload/image/object',$image);
            $insert['image'] = 'upload/image/object/'.$image;
        }
        $insert->save();
        $request->session()->flash('status', 'Thêm mới thành công!');
        return redirect()->back();
    }
}