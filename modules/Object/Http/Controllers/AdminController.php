<?php
namespace HPro\Object\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HPro\Object\Enities\Objects;
use HPro\Election\Enities\Election;
use Validator;

class ObjectController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Objects $model, Request $request)
    {
        $this->model    = $model;
        $this->middleware('auth');
    }
    

    public function getList(Request $request, $id){
        $election = Election::find($id);
        $data = Objects::where('election_id',$id)->get();
        return view('Object::object.list',compact('data','election'));
    }


    public function getCreate(Request $request, $election_id){
        $election = Election::find($election_id);
        return view('Object::object.create',compact('election'));
    }

    public function postCreate(Request $request, $election_id){

        $this->validate($request,$this->model->rules,$this->model->messages);
        $data = $request->all();
        $insert = new Objects($data);
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('upload/image/object',$image);
        $insert['image'] = 'upload/image/object/'.$image;
        $insert->save();
        $request->session()->flash('status', 'Thêm mới thành công!');
        return redirect()->route('get.list.object',$election_id);
    }

    public function getEdit(Request $request, $id){
        $data = Objects::find($id);
        return view('Object::object.edit',compact('data'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request,$this->model->rules,$this->model->messages);
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

    public function delete(Request $request, $id)
    {
        $data = Objects::find($id);
        $data->delete();
        $request->session()->flash('alert', 'Xóa thành công!');
        return redirect()->back();
    }

   
}