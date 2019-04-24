<?php

namespace HPro\Election\Enities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HPro\User\Enities\User;

class Vote extends Model
{

	protected $table = 'votes';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;



    public  $rules =
	[
        'voter_id'        => 'required',
		'object_id'        => 'required',
		'description'        => '',
	];

	public $messages = 
	[
        'voter_id.required' => 'Chưa chọn tên thành viên!',
		'object_id.required' => 'Chưa chọn đối tượng!',
	];


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

}

