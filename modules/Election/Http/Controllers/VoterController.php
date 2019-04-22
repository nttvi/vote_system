<?php
namespace HPro\Election\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Election\Enities\Election;
use HPro\Election\Enities\Voter;
use HPro\Member\Enities\Member;
use Validator;

class VoterController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Voter $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }

    public function getList(Request $request, $id){
        $election = Election::find($id);
        $data = Voter::where('election_id',$id)->get();

        return view('Election::Voter.list',compact('data','election'));
    }


    public function getCreate(Request $request, $election_id){
        $election = Election::find($election_id);
        $members = Member::get();
        $data = Voter::where('election_id',$election_id)->get();
        return view('Election::Voter.create',compact('election','members','data'));
    }

    public function postCreate(Request $request, $election_id){

        $this->validate($request,$this->model->rules,$this->model->messages);
        $election = Election::find($election_id);
        $voter = Voter::where('election_id',$election_id)->get();
        // dd(count($voter));

        $test = Voter::where('member_id',$request->member_id)->where('election_id',$election_id)->first();

        if($test){
            if($request->member_id == $test->member_id && $request->election_id == $test->election_id){
                $request->session()->flash('alert', 'Bạn đã thêm người này rồi');
                return redirect()->back();
            }else{
                if($election->voter_quality == count($voter)){
                    $request->session()->flash('alert', 'Đã đủ số người bầu trọn');
                    return redirect()->back();
                }else{
                    $data = $request->all();
                    $insert = new Voter($data);
                    $insert->save();
                    $request->session()->flash('status', 'Thêm mới thành công!');
                    return redirect()->back();
                }    
            }
        }else{
            if($election->voter_quality == count($voter)){
                    $request->session()->flash('alert', 'Đã đủ số người bầu trọn');
                    return redirect()->back();
                }else{
                    $data = $request->all();
                    $insert = new Voter($data);
                    $insert->save();
                    $request->session()->flash('status', 'Thêm mới thành công!');
                    return redirect()->back();
                }       
        }
        

        
    }


    public function delete(Request $request, $id)
    {
        $data = Voter::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}