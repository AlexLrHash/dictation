<?php

namespace App\Http\ViewComposers;

use App\MenuItem;
use Illuminate\View\View;
use App\User;
use App\Models\DictationModel;
use App\Models\DictationResultModel;

class HeaderComposer
{
    public function compose(View $view)
    {
        return $view->with([
            'countOfUsers' => User::get()->count(),
            'countOfDictation' => DictationModel::get()->count(),
            'countOfDictationResults' => DictationResultModel::get()->count()
        ]);
    }
}