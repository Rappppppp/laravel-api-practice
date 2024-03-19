<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UsersResource;
use App\Http\Repositories\Users\UsersRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Hash;

class UserController extends Controller
{

    public $repository;
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return UsersResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->repository->store($request);

        return response()->json([
            'status' => 'Success',
            'message' => 'User added successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
       $this->repository->update($request, $id);

        return response()->json([
            'status' => 'Success',
            'message' => 'User updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $isAdmin = auth()->user()->role == 'admin' ? 'delete sana' : 'configure middleware';
        // ! Since there is only one line of code (for now), can I put the Delete here instead of repository sir?
        User::findOrFail($id)->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'User deleted successfully'
        ], 200);
    }
}
