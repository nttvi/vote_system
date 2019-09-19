<?php
namespace HPro\Home\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\Auth;
use HPro\Category\Enities\Election_type;
use HPro\Election\Enities\Election;
use HPro\Object\Enities\Objects;
use HPro\Election\Enities\Voter;
use HPro\Election\Enities\Vote;

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
        
            return view('Home::home.login');
    }

    public function postHomeLogin(Request $request){
        // dd($request->all());
        $login = [
                        'email' => $request->input('account'),
                        'password' => $request->input('password'),
                    ];
        
        if (Auth::guard('member')->attempt($login)) {
            return redirect()->route('get.home.index');
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
        // dd($data);
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

        return redirect()->route('get.home.getEditBauChon',[$election->id,$election->slug]);
   }

    public function getEditBauChon(Request $request, $id, $slug)
    {
        $data = Election::find($id);
        $type = Election_type::get();
        $member = Member::get()->take(6);
        return view('Home::election.home_edit_election',compact('type','data','member'));
    }

    public function postEditBauChon(Request $request, $id, $slug)
    {
        $data = Election::find($id);
        $data->update($request->all());
        return redirect()->back();
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

    public function postEditDoiTuong(Request $request,$id){
        // dd($request->all());
        $data = Objects::find($id);
        
        if($request->file('image')==null){
            $data->update($request->all());
        }else{
            $data->update($request->all());
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('upload/image/object',$image);
            $data->image = 'upload/image/object/'.$image;
            $data->update();
        }
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->back();
    }
    public function postCreateThanhVienBC(Request $request, $election_id){

        $data = $request->member_id;
        foreach ($data as $key => $val) {
            $voter = Voter::where('member_id',$val)->where('election_id',$election_id)->first();
            if($voter){
                $request->session()->flash('alert', 'Đã thêm thành viên này rồi!');
            }else{
                $member = new Voter();
                $member->member_id = $val;
                $member->election_id = $election_id;
                $member->save();
                $request->session()->flash('status', 'Thêm mới thành công!');
            }

        }

        return redirect()->back();
    }

    public function deleteThanhVienBC(Request $request, $id)
    {
        $data = Voter::find($id);
        $data->delete();
        $request->session()->flash('status', 'Xóa thành công!');
        return redirect()->back();
    }

    public function ajaxThanhVien(Request $request)
    {
        $data = Member::where('name','like','%'.$request->key.'%')->orWhere('email','like','%'.$request->key.'%')->get();
        foreach($data as $key => $val){
            echo '<tr>';
            echo '<td><input type="checkbox" name="member_id[]" value="'.$val->id.'"></td>';
            echo '<td>'.$val->name.'</td>';
            echo '<td>'.$val->email.'</td>';
            echo '</tr>';
        }
    }


    public function getHomeElectionList(Request $request){
        $data = Election::orderBy('created_at','DESC')->paginate(15);
        $categories = Election_type::get();
        return view('Home::election.home_list_election',compact('data','categories'));
    }

    public function getHomeElectionListByCate(Request $request, $id){
        $categories = Election_type::get();
        $category = Election_type::find($id);
        $data = $category->elections()->paginate(15);
        return view('Home::election.home_list_election',compact('data','categories','category'));
    }

    public function getHomeElectionDetailContent(Request $request,$id){
        $categories = Election_type::get();
        $data = Election::find($id);
        return view('Home::election.home_detail_content_election',compact('data','categories'));
    }

    public function getHomeElectionDetail(Request $request,$id){
        $voter = Voter::where('member_id',Auth::guard('member')->id())->where('election_id',$id)->first();
        $data = Election::find($id);
        $categories = Election_type::get();
        
        if(isset($voter)){
            return view('Home::election.home_detail_election',compact('data','categories'));
        }else{
            return redirect()->back();
        }
    }

    public function postVoteCheck(Request $request,$id){
        // dd($request->check);
        $voter = Voter::where('member_id',$request->member_id)->where('election_id',$id)->first();
        $vote_dels = Vote::where('election_id',$id)->where('voter_id',$voter->id)->get();
            foreach ($vote_dels as $vote_del) {
                $vote_del->delete();                    
            }
        if($request->check){
            foreach ($request->check as $key => $val){
                $data = new Vote();
                $data->voter_id = $voter->id;
                $data->election_id = $id;
                $data->object_id = $val;
                $data->save();
            }
        }
        return redirect()->back();
    }

}