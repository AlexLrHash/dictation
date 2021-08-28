<?php 

namespace App\Repositories;
use App\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\DictationModel;
use Illuminate\Support\Arr;

class DictationAdminRepositories
{
    public function query($data) 
    {
        $this->dictations = DictationModel::query(); 
         $context['message'] = session('message', [
            'text' => '',
            'color' => ''
        ]);
        $context['dictations'] = $this->dictations->paginate(3);
        return $context;
    }

    public function updateDictation($data) 
    {
        $request = Arr::get($data, 'request');
        $message = '';
        if (Arr::get($request, 'id')) {
            $dictation = DictationModel::find(Arr::get($request, 'id'));
            $message = 'Диктант успешно изменен';
        }
        else {
            $dictation = new DictationModel();
            $message = 'Диктант успешно создан';
        }
        if ($dictation) {
            $dictation->link = Arr::get($request, 'link');
            $dictation->status = Arr::get($request, 'status') == 'true' ?  1 :  0;
            $dictation->title = Arr::get($request, 'title');
            $dictation->description = Arr::get($request, 'description');
            $dictation->started_at = Carbon::parse(Arr::get($request, 'started_at'))->format('Y-m-d h:m:i');
            $dictation->finished_at = Carbon::parse(Arr::get($request, 'finished_at'))->format('Y-m-d h:m:i');
            $dictation->save();
            session()->flash('message', [
                'text' => $message, 
                'color' => 'success'
            ]);
        }
        else {
            return 0;
        }
        return 1;
    }
}