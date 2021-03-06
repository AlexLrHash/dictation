<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DictationModel extends Model
{
  	protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
        'finished_at'
    ];

	public function dictationResult()
	{
		return $this->hasMany('App\Models\DictationResultModel', 'dictation_id');
	}
}
