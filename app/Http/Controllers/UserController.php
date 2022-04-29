<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        /* si s'utilitza la autoritzacio des del constructor les policies no
        em funcionen correctament, en canvi si vaig autoritzant una a una
        amb $this->authorize('action', $model) si que funcionen correctament;*/

        //$this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('viewAny', Auth::user());

        $users = User::all();

        return view('profile.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Auth::user());

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = new User();

        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role_id = $request->get('role');

        $user->save();

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        com que fem passar a l'administrador per una pantalla intermitja,
        no s'envien les seves dades directament aqui, com si que passa quan
        anem directament a "Manage profile"
        */
        $user = User::find($id);

        $this->authorize('update', $user);

        return view('profile.edit', ['user' => $user]);
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
        //
        $user = User::find($id);

        $this->authorize('update', $user, Auth::user());

        $user->username = $request->get('username');
        $user->email = $request->get('email');
        //en el cas de la contrasenya es millor comprovar aqui si son iguals o si no son nules
        //en els casos anteriors podiem posar les dades a la pagina d'edicio, pero amb la contrasenya millor que no per seguretat
        $newPass = $request->get('newPass');
        $newPassCheck = $request->get('confNewPass');
        //si les contrasenyes coincideixen i no son nules, guardem la nova contrasenya
        if (($newPass == $newPassCheck) && $newPass != null && $newPassCheck != null) {
            $user->password = Hash::make($newPass);
        }
        $user->updated_at = now();

        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        $this->authorize('delete', $user, Auth::user());

        $user->delete();

        return back();
    }
}
