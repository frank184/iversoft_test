<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $appends = array('role_name');
    
    public function getRoleNameAttribute()
    {
        return Role::$types[$this->user_roles_id];
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'user_roles_id',
    ];

    /**
     * The base validation rules for columns.
     *
     * @var array
     */
    public static $validation = [
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'user_roles_id' => ['required', 'integer', 'in:1,2,3']
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     
    protected $hidden = [];
    
    public function role() {
        return $this->belongsTo(Role::class, 'user_roles_id');
    }
    
    public function address() {
        return $this->hasOne(Address::class);
    }
    
}
