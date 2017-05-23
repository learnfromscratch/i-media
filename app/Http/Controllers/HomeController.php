<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Solarium;
use App\Repositories\Articles;
use Illuminate\Support\Facades\Auth;
use App\SousGroupe;
use App\User;
use App\Abonnement;
use Gate;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $client;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\Solarium\Client $client)
    {
        $this->middleware('auth');
        $this->middleware('abonnement');

        $this->client = $client;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultset = (new Articles($this->client))->index();
        $facet1 = $resultset->getFacetSet()->getFacet('language');
        $facet2 = $resultset->getFacetSet()->getFacet('author');
        $facet3 = $resultset->getFacetSet()->getFacet('source');

        return view('home', compact('resultset', 'facet1', 'facet2', 'facet3'));
    }


    /**
     *
     * @return int
     */
    public function search(Request $request)
    {
        $resultset = (new Articles($this->client))->search($request->data);
        $facet1 = $resultset->getFacetSet()->getFacet('language');
        $facet2 = $resultset->getFacetSet()->getFacet('author');
        $facet3 = $resultset->getFacetSet()->getFacet('source');

        $search = $request->data;

        return view('search', compact('resultset', 'search', 'facet1', 'facet2', 'facet3'));   
    }

    public function show(Request $request)
    {
        $folderPdfs = "Articles";

        $resultset = (new Articles($this->client))->show($request->id);

        return view('article', compact('resultset', 'folderPdfs'));
    }

    public function download(Request $request)
    {
        $data = file_get_contents('Articles/pdf_download.txt');
        $data++;
        file_put_contents('Articles/pdf_download.txt', $data);
        return response()->download($request->file);
    }

    public function admin()
    {
        $groupe = Auth::user()->groupe;
        $sousGroupes = $groupe->sousGroupes;
        $users = $groupe->users;
        $abonnement = $groupe->abonnement;

        return view('groupeAdmin', compact('groupe', 'sousGroupes', 'users', 'abonnement'));
    }

}
