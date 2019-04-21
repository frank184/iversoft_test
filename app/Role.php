<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_roles';
    
    public $timestamps = false;
    
    public function users() {
        return $this->hasMany(User::class, 'user_roles_id');
    }
    
    public static $types = [
      1 => 'Admin',
      2 => 'Publisher',
      3 => 'Public User'
    ];
}
