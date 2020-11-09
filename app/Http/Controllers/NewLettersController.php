<?php

namespace App\Http\Controllers;

use App\NewLetters;
use Illuminate\Http\Request;

class NewLettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $newletters = NewLetters::all();
        setLog(NewLetters::class,'Accès à liste des abonnés au new letter ');
        return view('backend.newletters.index', compact('newletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //createLog(NewLetters::class);
        return view('backend.newletters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

         if ( NewLetters::create($request->all())) {
           //session()->flash('message', tableName( NewLetters::class).' ajouté avec succès, id = '.lastChild( NewLetters::class));
           //storeLog( NewLetters::class);
           return redirect('newletterss');

       }
        //createFailureLog( NewLetters::class);
        return redirect('newletterss');
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

         if (NewLetters::findOrFail($id))   {
            $newletters = NewLetters::findOrFail($id);
            //showLog(NewLetters::class,$id);
            return view('backend.newletters.show', compact('newletters'));
        }

        session()->flash('error', ' l\'arcticle n\'existe pas !');
       //showFailureLog(NewLetters::class,$id);
        return view('backend.admin.newletters.index');

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

         if (NewLetters::findOrFail($id))   {
            $newletters = NewLetters::findOrFail($id);
           // editLog(NewLetters::class,$id);
                   return view('backend.newletters.edit', compact('newletters'));

        }

        // editFailureLog(NewLetters::class,$id);
         session()->flash('error', ' l\'arcticle n\'existe pas !');
         return view('backend.newletters.index');

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

          if (NewLetters::findOrFail($id)){
           $newletters =  NewLetters::findOrFail($id);

           if ($newletters->update($request->all())){
               session()->flash('success', 'Resource mise à jours avec succès!');
             //  updateLog(NewLetters::class,$id);
               return redirect('newletters');
           }
       }


        session()->flash('error', 'Echec mise à jours , l\'arcticle n\'existe pas !');
       // updateFailureLog(NewLetters::class,$id);
        return redirect('newletters');
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

         if (NewLetters::findOrFail($id))   {
            $newletters = NewLetters::findOrFail($id);
            $newletters->delete();
            session()->flash('success', 'mise à jours avec effectué avec succes!');
           // deleteLog(NewLetters::class,$id);
            return redirect('newletters');
        }

        session()->flash('error', 'Echec suppression , l\'arcticle n\'existe pas !');
       // deleteFailureLog(NewLetters::class,$id);
        return redirect('newletters');
    }
}
