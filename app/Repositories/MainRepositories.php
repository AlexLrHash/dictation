<?php

namespace App\Repositories;
use App\Models\DictationModel;
use App\Models\DictationResultModel;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class MainRepositories
{
	public function query($id) 
	{
		$context['dictationResult'] = DictationResultModel::find($id);
		if ($context['dictationResult']) {
			return $context['dictationResult'];
		}
		return false;
	}

	public function check($data) 
	{
		$request = Arr::get($data, 'request');
		$dictationResult = new DictationResultModel();
    	if ($dictationResult->where('user_id', auth()->user()->id)->where('dictation_id', Arr::get($request, 'data'))->count() == 0) {
    		$dictationResult->user_id = auth()->user()->id;
            $dictationResult->dictation_id = Arr::get($request, 'data');
    		$dictationResult->text = Arr::get($request, 'text');
    		$dictationResult->save();
    		return redirect(route('dictation', $dictationResult->id));
    	}
    	else {
    		return redirect(route("error"));
    	}
	}
}