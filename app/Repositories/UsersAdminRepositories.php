<?php 

namespace App\Repositories;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;


class UsersAdminRepositories
{
	public function deleteUser($user)
	{
    	if ($user && $user->hasRole('admin') == False) {
      		$user->delete();
            session()->flash('message', [
                'text' => 'Пользователь был успешно удален',
                'color'=> 'success'
            ]);
    	}
    	else {
    		return false;
    	}
    	return true;
	}

	public function sortQuery($request) 
	{
		if (Arr::get($request, 'sort')) {
 			$sort = Arr::get($request, 'sort');
            $order = Arr::get($request, 'order');
            $this->users->orderBy(Arr::get($request, 'sort'), $order);
			return [$sort, $order];
		}
		return ['', ''];
	}

	public function searchQuery($request)
	{
        if (Arr::get($request, 'search')) {
            $searchValue = Arr::get($request, 'search');
            $this->users->where('name', "LIKE", "%$searchValue%")->orWhere('email', "LIKE", "%$searchValue%");
        	return $searchValue;
        }
        return '';
	}

	public function filterQuery($request) 
	{
        if (Arr::get($request, 'filter')) {
            $filterValue = Arr::get($request, 'filter');
            $role = Role::find($filterValue);
            if ($role) {
                $this->users->role($role->name);
            }
            else {
                $message = session('message', 'Нет такого пользователя');
                return '';
            }
            return $filterValue;
        }
        return '';
	}

	public function query($data)
	{
		$context = [];
        $request = Arr::get($data, 'request');
		$this->users = User::query();
		$context['searchValue'] = $this->searchQuery($request);
		$context['filterValue'] = $this->filterQuery($request);
		[$sort, $order] = $this->sortQuery($request);
		$context['userRoles'] = Role::get();
		$context['sort'] = $sort;
		$context['order'] = $order;
		$context['users'] = $this->users->paginate(5);
        $context['message'] = session('message', [
            'text' => '',
            'color' => ''
        ]);

		return $context;
	}

}