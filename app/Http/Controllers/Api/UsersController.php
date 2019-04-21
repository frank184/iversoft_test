<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Address;
use App\Http\Resources\User as UserResource;

class UsersController extends Controller
{
   /**
    * Returns a list of Users.
    *
    * @return \App\User[] $users
    */
    function index() {
        return UserResource::collection(User::all());
    }

   /**
    * Returns a specific User.
    *
    * @param  \App\User  $user
    * @return \App\User $user
    */
    function show(User $user) {
        return new UserResource($user);
    }
   
   /**
    * Stores a new User object.
    *
    * @param  \App\User  $user
    * @return \App\User  $user
    */
    function store() {
        $validation = User::$validation + Address::$validation;
        array_push($validation['email'], 'unique:users');
        request()->validate($validation);
        $user = User::create($this->user_params());
        $user->address()->create($this->address_params());
        return new UserResource($user);
    }
   
   /**
    * Updates an existing User object.
    *
    * @param  \App\User  $user
    * @return \App\User  $user
    */
    function update(User $user) {
        $validation = User::$validation + Address::$validation;
        request()->validate($validation);
        $user->update($this->user_params());
        $user->address->update($this->address_params());
        return new UserResource($user);
    }
    
   /**
    * Deletes an existing User object.
    *
    * @param  \App\User  $user
    * @return \App\User  $user
    */
    function destroy(User $user) {
        $user->delete();
        return new UserResource($user);
    }
    
    private function user_params() {
      return request(['user_roles_id', 'email', 'username']);
    }
    
    private function address_params() {
      return request(['address', 'province', 'city', 'country', 'postal_code']);
    }

}
