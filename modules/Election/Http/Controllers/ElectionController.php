<?php
namespace HPro\Election\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Election\Enities\Election;
use HPro\Category\Enities\Election_type;
use Validator;

class ElectionController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Election $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }
    

    public function getList(Request $request){
        $data = Election::all();
        return view('Election::election.list',compact('data'));
    }


    public function getCreate(Request $request){
        $type = Election_type::get();
        return view('Election::election.create',compact('type'));
    }

    public function postCreate(Request $request){

        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = $request->all();
        $insert = new Election($data);
        $insert['slug'] = slug($request->title); 
        $insert->save();
        $request->session()->flash('status', 'Thêm mới thành công!');
        return redirect()->route('get.list.election');
    }

    public function getEdit(Request $request, $id){
        $type = Election_type::get();
        $data = Election::find($id);
        return view('Election::election.edit',compact('data','type'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = Election::find($id);
        $data->update($request->all());
        $data->slug = slug($request->title); 
        $data->save();
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $data = Election::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}