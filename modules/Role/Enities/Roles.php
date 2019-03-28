<?php

namespace HPro\Role\Enities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HPro\User\Enities\User;

class Roles extends Model
{
	use SoftDeletes;

	protected $table = 'roles';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;



    public  $rules =
	[
		'title'        => 'required',
		'description'        => '',
	];

	public $messages = 
	[
		'title.required' => 'Tên không được để trống!',
	];


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function user(){
        return $this->hasMany(User::class,'role_id','id');
    }

}

