<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'user_addresses';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'province', 'city', 'country', 'postal_code',
    ];
    
    public static $validation = [
        'address' => ['required', 'string', 'max:255'],
        'province' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'postal_code' => ['required', 'string', 'max:255'],
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
