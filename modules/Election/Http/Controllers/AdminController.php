<?php
namespace HPro\Election\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Election\Enities\Election;
use Validator;

class AdminController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Election $model, Request $request)
    {
        $this->model    = $model;
    }
    
    public function searchElectionAdmin(Request $request)
    {
    	$data = Election::where('title','like','%'.$request->key.'%')->get();
    	return view('Election::election.list',compact('data'));
    }
   
}