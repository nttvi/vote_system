<?php
namespace HPro\Member\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Member\Enities\Member;
use HPro\Election\Enities\Election;
use HPro\Election\Enities\Voter;
use Validator;

class WebController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Member $model, Request $request)
    {
        $this->model    = $model;
    }
    
    public function getEditHome()
    {
        $data = Member::find(auth('member')->user()->id);
        return view('Member::home.edit',compact('data'));
    }

    public function postEditHome(Request $request)
    {
        $data = Member::find(auth('member')->user()->id);
        $data->update($request->all());
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->back();
    }

   
}