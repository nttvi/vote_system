<?php
namespace HPro\Member\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Member\Enities\Member;
use HPro\Election\Enities\Election;
use HPro\Election\Enities\Voter;
use Validator;

class MemberController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Member $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }
    
    public function getElection(Request $request, $id){
        $data = Election::where('member_id',$id)->get();
        return view('Member::member.election',compact('data'));
    }

    public function getElectionJoin(Request $request, $id){
        $data = Voter::where('member_id',$id)->get();
        return view('Member::member.election_join',compact('data'));
    }

    public function getList(Request $request){
        $data = Member::all();
        return view('Member::member.list',compact('data'));
    }

    public function getListOnMonth(Request $request){
        $members = Member::all();
        $data=[];
        foreach ($members as $key => $value) {
            $date_current = getdate();
            if((int)date_format($value->created_at,'m') === $date_current['mon']){
                $data[$key] = $value;
            }
        }
        return view('Member::member.list_on_month',compact('data'));
    }

    public function getCreate(Request $request){
        return view('Member::member.create');
    }

    public function postCreate(Request $request){

        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = $request->all();
        $insert = new Member($data);
        $insert['password'] = bcrypt($request->password);
        $insert->save();
        $request->session()->flash('status', 'Thêm mới thành công!');
        return redirect()->route('get.list.member');
    }

    public function getEdit(Request $request, $id){
        $data = Member::find($id);
        return view('Member::member.edit',compact('data'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = Member::find($id);
        $data->update($request->all());
        $data->update();
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $data = Member::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}