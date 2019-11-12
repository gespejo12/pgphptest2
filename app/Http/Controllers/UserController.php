<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserComment;

class UserController extends Controller
{
	public function __construct() 
	{
    
    }

    public function index() 
    {

    }

    public function show($id) {
    	$user = User::find($id);
    	return $user ? view('user', compact('user')) : abort(404);
    }

    public function store(Request $request) 
    {
    	try {
    		$this->validateRequiredFields($request->all());

    		$user = User::find($request->id);

    		if (!$user)
    			throw new \Exception("User not found.", 404);

    		$comment = trim($request->comment);

    		if (!$comment)
            	return $this->error('Comment cannot be null.');

    		UserComment::create(['user_id' => $request->id, 'comment' => $comment]);

    		$message = 'Comment saved.';
    		$status = 'success';
    		$code = 200;
    	} catch (\Exception $e) {
    		$message = $e->getMessage();
    		$status = 'error';
    		$code = $e->getCode();
    	}

    	return response()->json([
		    'message' => $message,
		    'status' => $status,
		    'code'	=> $code
		]);

    }

	private function validateRequiredFields($fields) {
		try {
			foreach(['password', 'id', 'comment'] as $key){
		    	if (!isset($fields[$key]))
		    		throw new \Exception("Missing key/value for $key", 422);
		    }

		    if(strtoupper($fields['password']) != '720DF6C2482218518FA20FDC52D4DED7ECC043AB')
        		throw new \Exception('Invalid password', 401);

        	if(!is_numeric($fields['id']))
        		throw new \Exception('Invalid id', 422);

		} catch (Exception $e) {
			throw $e;
		}
		
 	}
}
