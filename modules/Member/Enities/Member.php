<?php

namespace HPro\Member\Enities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HPro\Election\Enities\Election;
use HPro\Election\Enities\Voter;

class Member extends Model
{
	use SoftDeletes;

	protected $table = 'members';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;



    public  $rules =
	[
		'name'        => 'required',
		'description'        => '',
	];

	public $messages = 
	[
		'name.required' => 'Tên không được để trống!',
	];


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->name;
    }

    public function election()
    {
        return $this->hasMany(Election::class,'member_id');
    }

    public function voter()
    {
        return $this->hasMany(Voter::class,'member_id');
    }

}

