<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Home Page
    public function homePage() {
		return view('admin.home');
    }
}
