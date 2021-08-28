<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictationResultModel;
use App\Models\DictationModel;
use Carbon\Carbon;
use App\Repositories\DictationResultsAdminRepositories;

class DictationResultsController extends Controller
{
    protected $repositoryDictationResults;
    public function __construct(DictationResultsAdminRepositories $dictationResults)
    {
        $this->repositoryDictationResults = $dictationResults;
    }
    // Dictation Result Page
    public function dictationResultsPage(Request $request) 
    {
        $data = ['request' => $request->all()];
        $context = $this->repositoryDictationResults->query($data);

    	return view("admin.dictation_results", $context);
    }

     // Delete Dictation Result
    public function deleteDictationResult($id) 
    {
        $response = $this->repositoryDictationResults->deleteDictationResult($id) ? response()->json() :response()->json(['error' => 'Нет результата диктантов с таким идентификатором'], 404);    	

        return $response;
    }

    public function fetch(Request $request) 
    {
        $data = ['request' => $request];
        $response = $this->repositoryDictationResults->fetchQuery($data);
       
       return $response;
    }
}
