<?php

namespace HPro\Home\Enities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;



    public  $rules =
    [
        'name'        => 'required',
        'phone'       => 'required|numeric|unique:users',
        'phone'       => 'required|numeric|unique:users',
        'email'       => 'required|e-mail|unique:users',
        'password'    => 'required|min:6',
        'role_id'     => 'required',
    ];

    
}
