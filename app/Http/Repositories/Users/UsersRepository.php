<?php 

namespace App\Http\Repositories\Users;

use App\Models\User;

use Hash;

class UsersRepository {

    public function store($request) {
        $user = User::firstOrCreate([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->cart()->create();
    }

    public function update($request, $id){

        User::findOrFail($id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            "password" => Hash::make($request->password)
        ]);
    }

}