<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictationModel;
use App\Models\DictationResultModel;
use App\Repositories\MainRepositories;
use App\User;
use Carbon\Carbon;

class MainController extends Controller
{
    protected $repositoryMainDictationResults;
    public function __construct(MainRepositories $dictationResults)
    {
        $this->repositoryMainDictationResults = $dictationResults;
    }

    // Main Page
    public function main() 
    {
    	return view('main');
    }

    // Dictation Page
    public function dictation($id) 
    {
    	$context['dictationResult'] = $this->repositoryMainDictationResults->query($id);
    	return view('dictation', $context);
    }

    // Errors
    public function error() 
    {
    	return view('errors.validation_error');
    }

    // Check dictation result
    public function check(Request $request) 
    {
        $data = ["request" => $request->all()];
    	$response = $this->repositoryMainDictationResults->check($data);

        return $response;
    }
}
