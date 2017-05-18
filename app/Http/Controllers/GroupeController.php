<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groupe;
use App\Keyword;
use App\User;
use App\Abonnement;
use Gate;
use Carbon\Carbon;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::where('id', '<>', 1)->get();

        return view('admin.groupes', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create', Groupe::class))
        {
            return redirect()->back()->with('error', 'Vous n êtes pas autorisé à éffectuer cette action');
        }
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groupe = new Groupe();
        $groupe->name = $request['name'];
        $groupe->nbrUser = $request['nbrUser'];
        $groupe->tel = $request['tel'];
        $groupe->address = $request['address'];

        $groupe->save();

        $request['tags'] = explode( ',', $request['tags']);
        $keywords_id = [];
        foreach ($request['tags'] as $val)
        {
            $keyword = Keyword::firstOrCreate(['name' => $val]);
            array_push($keywords_id, $keyword->id);
        }

        $groupe->keywords()->attach($keywords_id === null ? [] : $keywords_id);

        Abonnement::insert([
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'groupe_id' => $groupe->id,
            ]);

        User::insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'groupe_id' => $groupe->id,
            'role_id' => 2,
        ]);

        return redirect()->back()->with('success', 'Client créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('read', Groupe::class))
        {
            return redirect()->back()->with('error', 'Vous n êtes pas autorisé à éffectuer cette action');
        }

        $groupe = Groupe::find($id);
        $users = $groupe->users;
        $keywords = $groupe->keywords;

        return view('admin.groupeInfo', compact('groupe', 'keywords', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('update', Groupe::class))
        {
            return redirect()->back()->with('error', 'Vous n êtes pas autorisé à éffectuer cette action');
        }

        $groupe = Groupe::find($id);
        $groupe->nbrUser = $request['nbrUser'];
        $groupe->tel = $request['tel'];
        $groupe->address = $request['address'];
        $groupe->abonnement->update(['end_date' => $request['end_date']]);

        $request['tags'] = explode( ',', $request['tags']);
        $keywords_id = [];
        foreach ($request['tags'] as $val)
        {
            $keyword = Keyword::firstOrCreate(['name' => $val]);
            array_push($keywords_id, $keyword->id);
        }
        $groupe->keywords()->detach();
        $groupe->keywords()->attach($keywords_id === null ? [] : $keywords_id);

        $groupe->updated_at = Carbon::now();

        $groupe->save();

        return redirect()->back()->with('success', 'Modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('create', Groupe::class))
        {
            return redirect()->back()->with('error', 'Vous n êtes pas autorisé à éffectuer cette action');
        }

        $groupe = Groupe::find($id);
        $groupe->delete();

        return redirect()->route('groupes.index')->with('success', 'Le client a été supprimer avec succès');
    }
}
