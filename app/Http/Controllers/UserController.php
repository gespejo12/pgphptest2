<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function __construct() {
    
    }

    public function index() {

    }

    public function show($id) {
    	$user = User::find($id);
    	return $user ? view('user', compact('user')) : abort(404);
    }
}
