<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserDeleteValidationRequest;
use App\Repositories\UsersAdminRepositories;


class UsersController extends Controller
{
    protected $repositoryUsers;

    public function __construct(UsersAdminRepositories $users)
    {
        $this->repositoryUsers = $users;
    }

    // Users Page
    public function usersPage(Request $request) 
    {
        $data = ['request' => $request->all()];
        $context = $this->repositoryUsers->query($data);
        return view("admin.users", $context);
    }
  	
    // Delete Users
    public function deleteUser(UserDeleteValidationRequest $request, User $user) 
    {
        $user = $this->repositoryUsers->deleteUser($user);
        $response = $user ? response()->json($user) :response()->json(['error' => 'Нет возможности удалить пользователя']);
        $response = response()->json($user);
    	return $response; 
    }
}
