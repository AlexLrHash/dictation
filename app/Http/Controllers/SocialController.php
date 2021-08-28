<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SocialRepositories;

class SocialController extends Controller
{
    protected $repositorySocial;
    public function __construct(SocialRepositories $social)
    {  
        $this->repositorySocial = $social;
    }

    public function index() 
    {
    	$response = $this->repositorySocial->index();
        return $response;
    }

    public function callback() 
    {
    	$response = $this->repositorySocial->callback();
        return $response;
    }
}
