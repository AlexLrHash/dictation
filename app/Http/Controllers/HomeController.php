<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\HomeRepositories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repositoryHomeDictation;
    public function __construct(HomeRepositories $dictation)
    {
        $this->middleware('auth');
        $this->repositoryHomeDictation = $dictation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Home Page
    public function index()
    {   
        $context = $this->repositoryHomeDictation->index();
        return view('home', $context);
    }

    // Resend
    public function resend(Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
