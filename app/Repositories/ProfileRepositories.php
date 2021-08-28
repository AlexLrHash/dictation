<?php 

namespace App\Repositories;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProfileRepositories 
{

	public function imageUpload($data)
	{
		$request = Arr::get($data, 'request');
		$image = Arr::get($data, 'image');
        $user = auth()->user();
        Storage::delete($user->image);
        $user->image = $image;
        $user->save();      
        session()->flash('message', 'Ваш аватар был успешно изменен');
        return response()->json($user);
	}

	public function nameUpdate($data) 
	{
		$request = Arr::get($data, 'request');
		$name = Arr::get($request, 'name');
		$user = auth()->user();
        $user->name = $name;
        $user->save();
        session()->flash('message', 'Ваше имя было успешно изменено');
        return response()->json($user);
	}
}
