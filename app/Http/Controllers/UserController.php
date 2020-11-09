<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'username' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::all();
        defaultLog(User::class);
        return view('backend.users.index', compact('user'));
    }


        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function adherants()
    {
        $user = User::where('role',2)->get();
        defaultLog(User::class);
        return view('backend.users.adherants', compact('user'));
    }



        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function bibliothecaire()
    {
        $user = User::where('role',1)->get();
        defaultLog(User::class);
        return view('backend.users.admin', compact('user'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function gallerie()
    {
        $articles = Article::where('gallerie',1)->get();
        return view('backend.gallerie.index', compact('articles'));
    }



       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function gallerieAdd()
    {
        return view('backend.gallerie.create');
    }

        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function joueurs()
    {
        $user = User::where('role',2)->get();
        defaultLog(User::class);
        return view('backend.users.bibliotecaires', compact('user'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function creteAdmin()
    {

        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
         $_data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'statut' => true,
            'confirm_token' => str_randomize(20),
            'role' => 1,
            'password' => Hash::make('@password'),
         ];

        if ( User::create($_data)) {
            session()->flash('message', tableName(User::class).' ajouté avec succès, id = '.lastChild(User::class));
            return redirect('bibliothecaire');

        }
        return redirect('bibliothecaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {

        if (User::findOrFail($id))   {
            $user = User::findOrFail($id);
            return view('backend.users.show', compact('user'));
        }

        session()->flash('error', ' l\'arcticle n\'existe pas !');
        return view('backend.users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {

        if (User::findOrFail($id))   {
            $user = User::findOrFail($id);
            return view('backend.users.edit', compact('user'));
        }

        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {


        if (User::findOrFail($id)){
            $user =  User::findOrFail($id);

            if ($user->update($request->all())){
                session()->flash('success', 'Log mise à jours avec succès!');
                return redirect('user');
            }
        }


        session()->flash('error', 'Echec mise à jours , l\'arcticle n\'existe pas !');
        return redirect('user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (User::findOrFail($id))   {
            $user = User::findOrFail($id);
            $user->delete();
            session()->flash('success', 'mise à jours avec effectué avec succes!');
            return redirect('user');
        }

        session()->flash('error', 'Echec suppression , l\'arcticle n\'existe pas !');
        return redirect('user');
    }
}
