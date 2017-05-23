<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SousGroupe;

class SousGroupeController extends Controller
{ 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sousGroupe = new SousGroupe();
        $sousGroupe->name = $request['name'];
        $sousGroupe->groupe_id = $request['groupe_id'];
        $sousGroupe->keywords = implode(',', $request['tags']);

        $sousGroupe->save();

        return redirect()->back()->with('success', 'Groupe créé avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sousGroupe = SousGroupe::find($id);
        $sousGroupe->delete();

        return redirect()->back()->with('success', 'Le client a été supprimer avec succès');
    }   //
}
