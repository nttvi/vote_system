<?php
namespace HPro\Category\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Category\Enities\Election_type;
use Validator;

class Election_typeController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Election_type $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }
    

    public function getList(Request $request){
        $data = Election_type::all();
        return view('Category::election_type.list',compact('data'));
    }


    public function getCreate(Request $request){
        return view('Category::election_type.create');
    }

    public function postCreate(Request $request){

        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = $request->all();
        $insert = new Election_type($data);
        $insert->save();
        $request->session()->flash('status', 'Thêm mới thành công!');
        return redirect()->route('get.list.election_type');
    }

    public function getEdit(Request $request, $id){
        $data = Election_type::find($id);
        return view('Category::election_type.edit',compact('data'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = Election_type::find($id);
        $data->update($request->all());
        $data->save();
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $data = Election_type::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}