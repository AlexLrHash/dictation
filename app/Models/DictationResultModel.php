<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\QueryFilter;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictationResultModel extends Model
{	
    use SoftDeletes;
    
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
	
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function dictation()
    {

        return $this->belongsTo(DictationModel::class);
    }
}
