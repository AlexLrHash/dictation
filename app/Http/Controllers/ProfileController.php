<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileNameValidationRequest;
use App\Http\Requests\ProfileImageValidationRequest;
use App\Models\DictationResultModel;
use App\Repositories\ProfileRepositories;

class ProfileController extends Controller
{
    protected $repositoryUserProfile;
    public function __construct(ProfileRepositories $user) 
    {
        $this->repositoryUserProfile = $user;
    }

    // Profile
    public function profilePage() 
    {
        $message = session('message', '');

        return view('profile', compact('message', 'colorOfMessage'));
    }

    // Upload Image
    public function imageUpload(ProfileImageValidationRequest $request) 
    {
        $image = $request->file('image')->store('uploads', 'public');
        $data = ['request' => $request, 'image' => $image];
        $response = $this->repositoryUserProfile->imageUpload($data);

        return $response;
    }

    // Update Name 
    public function nameUpdate(ProfileNameValidationRequest $request) 
    {
        $data = ['request' => $request->all()];
        $response = $this->repositoryUserProfile->nameUpdate($data);
        
        return $response;
    }
}
