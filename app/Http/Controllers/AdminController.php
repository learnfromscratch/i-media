<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserKeyword;
use App\Keyword;
use App\Repositories\Solarium;
use App\Repositories\Alert;
use App\Message;

class AdminController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->middleware('auth');
    	$this->middleware('admin');
    }

    public function index(\Solarium\Client $client)
    {
        $nbrUser = count(User::all());
        $indexed = (new Solarium($client))->indexed();
    	return view('admin.dashboard', compact('nbrUser', 'indexed'));
    }

    public function indexing(\Solarium\Client $client)
    {
        (new Solarium($client))->indexing();

        (new Alert($client))->index();

        return redirect()->route('admin.dashboard');
    }

    public function showUsers()
    {
        $users = User::paginate('10');

        return view('admin.users', compact('users'));
    }

    public function addUsers()
    {
        $keywords = Keyword::all();
        return view('admin.addUsers', compact('keywords'));
    }


}
