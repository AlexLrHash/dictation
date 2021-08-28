<?php 

namespace App\Repositories;
use Carbon\Carbon;
use App\Models\DictationModel;
use App\Models\DictationResultModel;


class HomeRepositories
{
	public function index()
	{
		$now = new Carbon();
        $already = false;
        $dictation = DictationModel::where('status', 1)->where('started_at', '<', $now)->where('finished_at', '>', $now)->first();
        if ($dictation) {
         	if (DictationResultModel::where('user_id', auth()->user()->id)->where('dictation_id', $dictation->id)->first()) {
               $already = true;
            }            
        }
        $context = [
        	'already' => $already,
        	'dictation' => $dictation
        ];
        return $context;
	}
}