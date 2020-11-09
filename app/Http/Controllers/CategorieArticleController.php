<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CategorieArticle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CategorieArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorie = CategorieArticle::all();
        //defaultLog(CategorieArticle::class);
        return view('backend.categorie-article.index', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //createLog(CategorieArticle::class);
        return view('backend.categorie-article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

         if ( CategorieArticle::create($request->all())) {
           //session()->flash('message', tableName( CategorieArticle::class).' ajouté avec succès, id = '.lastChild( CategorieArticle::class));
           //storeLog( CategorieArticle::class);
           return redirect('categorie-article');

       }
        //createFailureLog( CategorieArticle::class);
        return redirect('categorie-article/create');
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

         if (CategorieArticle::findOrFail($id))   {
            $categorie = CategorieArticle::findOrFail($id);
            //showLog(CategorieArticle::class,$id);
            return view('backend.categorie-article.show', compact('categorie'));
        }

        session()->flash('error', ' l\'arcticle n\'existe pas !');
       //showFailureLog(CategorieArticle::class,$id);
        return view('backend.admin.categorie-article.index');

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

         if (CategorieArticle::findOrFail($id))   {
            $categorie = CategorieArticle::findOrFail($id);
           // editLog(CategorieArticle::class,$id);
                   return view('backend.categorie.edit', compact('categorie'));

        }

        // editFailureLog(CategorieArticle::class,$id);
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

          if (CategorieArticle::findOrFail($id)){
           $categorie =  CategorieArticle::findOrFail($id);

           if ($categorie->update($request->all())){
               session()->flash('success', 'Resource mise à jours avec succès!');
             //  updateLog(CategorieArticle::class,$id);
               return redirect('categorie');
           }
       }


        session()->flash('error', 'Echec mise à jours , l\'arcticle n\'existe pas !');
       // updateFailureLog(CategorieArticle::class,$id);
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

         if (CategorieArticle::findOrFail($id))   {
            $categorie = CategorieArticle::findOrFail($id);
            $categorie->delete();
            session()->flash('success', 'mise à jours avec effectué avec succes!');
           // deleteLog(CategorieArticle::class,$id);
            return redirect('categorie');
        }

        session()->flash('error', 'Echec suppression , l\'arcticle n\'existe pas !');
       // deleteFailureLog(CategorieArticle::class,$id);
        return redirect('categorie');
    }

}
