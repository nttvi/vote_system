<?php

namespace HPro\Election\Enities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HPro\Member\Enities\Member;
use HPro\Object\Enities\Objects;
use HPro\Election\Enities\Voter;

class Election extends Model
{
	use SoftDeletes;

	protected $table = 'elections';

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

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }

    public function objects()
    {
        return $this->hasMany(Objects::class,'election_id');
    }

    public function voter()
    {
        return $this->hasMany(Voter::class,'election_id');
    }
}

