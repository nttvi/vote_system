<?php
namespace HPro\Member\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Member\Enities\Member;
use Validator;

class AdminController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Member $model, Request $request)
    {
        $this->model    = $model;
    }
    
    public function searchMemberAdmin(Request $request)
    {
        $data = Member::where('name','like','%'.$request->key.'%')->get();
        return view('Member::member.list',compact('data'));
    }

    public function searchMemberOnMonthAdmin(Request $request)
    {
        $members = Member::where('name','like','%'.$request->key.'%')->get();
        $data = [];
        foreach ($members as $key => $value) {
            $date_current = getdate();
            if((int)date_format($value->created_at,'m') === $date_current['mon']){
                $data[$key] = $value;
            }
        }
        return view('Member::member.list_on_month',compact('data'));
    }
   
}