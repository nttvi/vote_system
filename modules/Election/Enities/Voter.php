<?php

namespace HPro\Election\Enities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HPro\Election\Enities\Election;

class Voter extends Model
{
	use SoftDeletes;

	protected $table = 'voters';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;



    public  $rules =
	[
		'member_id'        => 'required',
		'description'        => '',
	];

	public $messages = 
	[
		'member_id.required' => 'Chưa chọn tên thành viên!',
	];


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function election(){
        return $this->belongsTo(Election::class,'election_id');
    }

}

