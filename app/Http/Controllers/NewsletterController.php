<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(Request $request)
    {
    	Newsletter::firstOrCreate(['email' => $request->email]);
    	return redirect()->back()->with('info', 'Vous avez été enregistrer');
    }
}
