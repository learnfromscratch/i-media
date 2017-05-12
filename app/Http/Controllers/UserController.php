<?php

namespace App\Http\Controllers;

use App\User;
use App\Keyword;
use Illuminate\Http\Request;
use Carbon\carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $users = User::select()->orderBy('updated_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $keywords = Keyword::all();
        return view('admin.profil', compact('user', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request['email'];
        $user->tel = $request['tel'];
        $user->address = $request['address'];
        $user->abonnement->update(['end_date' => $request['end_date']]);

        $request['tags'] = explode( ',', $request['tags']);
        $keywords_id = [];
        foreach ($request['tags'] as $val)
        {
            $keyword = Keyword::firstOrCreate(['name' => $val]);
            array_push($keywords_id, $keyword->id);
        }
        $user->keywords()->detach();
        $user->keywords()->attach($keywords_id === null ? [] : $keywords_id);

        $user->updated_at = Carbon::now();

        $user->save();
        return redirect()->back()->with('success', 'Modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->role == 'admin')
            return redirect()->route('users.all')->with('error', 'impossible de supprimer cet utilisateur');
        $user->delete();
        return redirect()->route('users.all')->with('success', 'Le client a été supprimer avec succès');
    }
}
