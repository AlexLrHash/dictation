<?php 

namespace App\Repositories;
use App\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\DictationResultModel;
use App\Models\DictationModel;
use Illuminate\Support\Arr;

class DictationResultsAdminRepositories
{
    public function fetchQuery($data) 
    {
        if (Arr::get($data, 'request.query')) {
            $query = Arr::get($data, 'request.query');
            $data = DictationModel::where("title", "LIKE", "%$query%")->get();
            $response = array();
            foreach ($data as $dictation) {
                $response[] = array(
                    "value" => $dictation->title.'('.Carbon::parse($dictation->created_at)->format('d.m.Y h:i').')',
                    "id" => $dictation->id,
                );
            }
            return $response;
        }
    }

    public function deleteDictationResult($id) 
    {
        $dictationResult = DictationResultModel::find($id);
        if ($dictationResult) {
            session()->flash('message', [
                'text' => 'Результат был успешно удален',
                'color'=> 'success'
            ]);
            $dictationResult->delete();
        }
        else {
            return 0;
        }
        return 1;
    }

    public function searchQuery($request) 
    {
        if (Arr::get($request, 'search')) {
            $searchValue = Arr::get($request, 'search');
            $this->dictationResults
            ->where('users.email', "LIKE", "%$searchValue%")
            ->orWhere('users.name', "LIKE", "%$searchValue%");
            return $searchValue;
        }
        return '';
    }

    public function filterQuery($request)
    {
        if (Arr::get($request, 'filter')) {
            $filterId = Arr::get($request, 'filter');
            $this->dictationResults->where('dictation_models.id', $filterId);
            $filterValue = Arr::get($request, 'filteName');
            return [$filterValue, $filterId];
        }
        return ['', ''];
    }

    public function sortQuery($request) 
    {
        if (Arr::get($request, 'sort')) {
            $order = Arr::get($request, 'order');
            $sort = Arr::get($request, 'sort');
            $sortAttribute = '';
            switch ($sort) {
                case 'title_of_dictation':
                    $sortAttribute = 'dictation_models.title';
                    break;
                case 'user_name':
                    $sortAttribute = 'users.name';
                    break;
                case 'user_email':
                    $sortAttribute = 'users.email';
                    break;    
                case 'input_at':
                    $sortAttribute = 'created_at';
                    break;  
                case 'id':
                    $sortAttribute = 'id';
                    break;
            }
            $this->dictationResults->orderBy($sortAttribute, $order);
            return [$sort, $order];
        }           
        return ['', ''];
    }

    public function query($data) 
    {
        $this->dictationResults = DictationResultModel::query();
        $context = [];

        [$context['sort'], $context['order']] = $this->sortQuery(Arr::get($data, 'request'));
        $context['message'] = session('message', [
            'text' => '',
            'color' => ''
        ]);
        $context['searchValue'] = $this->searchQuery(Arr::get($data, 'request'));
        [$context['filterValue'], $context['filterId']] = $this->filterQuery(Arr::get($data, 'request'));

        $this->dictationResults->join('dictation_models', 'dictation_models.id', '=', 'dictation_result_models.dictation_id')->join('users', 'users.id', '=', 'dictation_result_models.user_id');
        $this->dictationResults->select(["dictation_result_models.id", 'dictation_result_models.dictation_id', 'dictation_result_models.user_id', 'dictation_result_models.created_at', 'dictation_models.title']);
        $context['dictationQuery'] = DictationModel::get();
        $context['dictationResults'] = $this->dictationResults->paginate(5);
        return $context;
    }

}