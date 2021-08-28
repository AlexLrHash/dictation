<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DictationCreateUpdateValidaionRequest;
use App\Repositories\DictationAdminRepositories;

class DictationController extends Controller
{
    protected $repositoryDictations;

    public function __construct(DictationAdminRepositories $dictations)
    {
        $this->repositoryDictations = $dictations;
    }

    // Dictation Page
    public function dictationsPage(Request $request) 
    {
        $data = ['request' => $request->all()];
        $context = $this->repositoryDictations->query($data);
    
    	return view("admin.dictation", $context);
    }

    // Update Dictation
    public function updateDictation(DictationCreateUpdateValidaionRequest $request) 
    {
        $data = ['request' => $request->all()];
        $response = $this->repositoryDictations->updateDictation($data) ? response()->json($data) : response()->json('Нет такого диктанта');
        return $response;
    }
}
