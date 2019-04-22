<?php
namespace HPro\Election\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Election\Enities\Election;
use HPro\Election\Enities\voter;
use HPro\Object\Enities\Objects;
use HPro\Election\Enities\Vote;
use HPro\Member\Enities\Member;
use Validator;

class VoteController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(vote $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }

    public function getList(Request $request, $id){
        $election = Election::find($id);
        $objects = Objects::where('election_id',$id)->get();
        $data = vote::where('election_id',$id)->get();

        return view('Election::vote.list',compact('data','election','objects'));
    }


    public function getCreate(Request $request, $election_id){
        $election = Election::find($election_id);
        $voters = Voter::where('election_id',$election_id)->get();
        $objects = Objects::where('election_id',$election_id)->get();
        $data = Vote::where('election_id',$election_id)->get();
        return view('Election::vote.create',compact('election','voters','data','objects'));
    }

    public function postCreate(Request $request, $election_id){

        $this->validate($request,$this->model->rules,$this->model->messages);

        foreach ($request->object_id as $key => $val){

            $vote = Vote::where('election_id',$election_id)
                        ->where('object_id',$val)
                        ->where('voter_id',$request->voter_id)
                        ->first();

            if($vote){
                $request->session()->flash('alert', 'Đã bầu cử cho đối tượng '.objectName($val));
                continue;
            }else{

                $data = new Vote();
                $data->voter_id = $request->voter_id;
                $data->election_id = $request->election_id;
                $data->object_id = $val;
                $data->save();
                
            }
    
        }

        return redirect()->back();

        
    }


    public function delete(Request $request, $id)
    {
        $data = vote::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}