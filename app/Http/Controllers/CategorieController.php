<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Http\Resources\Categorie as CategorieResource;
use App\Http\Resources\CategorieResource as CatR;

class CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorie = Categorie::all();
        setLog(Categorie::class,'Consultation de la liste des categories');
        return view('backend.categorie.index', compact('categorie'));
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson()
    {
        $categories = CategorieResource::collection(Categorie::orderBy('id','desc')->get());
        setLog(Categorie::class,'Consultation de la liste des categories');

        return response()->json(['categories' => $categories]);

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCollectionJson()
    {
        $categories = CatR::collection(Categorie::orderBy('nom','asc')->get());
        setLog(Categorie::class,'Consultation de la liste des categories');

        return response()->json(['categories' => $categories]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //createsetLog(Categorie::class);
        return view('backend.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

         if ( Categorie::create($request->all())) {
            setLog(Categorie::class,'Enregistrerment d\'une nouvelle categorie');
            return response()->json(['message'=> 'La categorie a été crée avec succès !', 'status' => true]);
        }

        return response()->json(['message'=> 'Echec ! , veuillez réessayer','status'=> false]);

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

         if (Categorie::findOrFail($id))   {
            $categorie = Categorie::findOrFail($id);
            setLog(Categorie::class,'Consultation de la categorie avec l\'id = '.$id);
            return view('backend.categorie.show', compact('categorie'));
        }

        session()->flash('error', ' l\'arcticle n\'existe pas !');
       //showFailuresetLog(Categorie::class,$id);
        return view('backend.admin.categorie.index');

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

         if (Categorie::findOrFail($id))   {
            $categorie = Categorie::findOrFail($id);
           // editsetLog(Categorie::class,$id);
                   return view('backend.categorie.edit', compact('categorie'));

        }

        // editFailuresetLog(Categorie::class,$id);
         session()->flash('error', ' l\'arcticle n\'existe pas !');
         return view('backend.categorie.index');

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

          if (Categorie::findOrFail($id)){
           $categorie =  Categorie::findOrFail($id);

           if ($categorie->update($request->all())){
               session()->flash('success', 'Resource mise à jours avec succès!');
               setLog(Categorie::class,'Mise à jours de la categorie avec l\'id = '.$id);
               return redirect('categorie');
           }
       }


        session()->flash('error', 'Echec mise à jours , l\'arcticle n\'existe pas !');
       // updateFailuresetLog(Categorie::class,$id);
        return redirect('categorie');
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

        if(Categorie::find($id)){
            $categorie =Categorie::find($id);
            $categorie->delete();
            setLog(Categorie::class,'Suppression de la categorie avec l\'id = '.$id);

           return response()->json(['message'=> 'La categorie a été supprimée avec succès !', 'status' => true]);
        }

        return response()->json(['message'=> 'La categorie n\'existe pas ! , veuillez réessayer','status'=> false]);
    }

}
