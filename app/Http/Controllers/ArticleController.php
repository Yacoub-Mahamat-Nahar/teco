<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\CategorieArticle as Categorie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::whereGallerie(null)->orderBy('id','desc')->get();

        setLog(Article::class,'Consultation de la Liste des articles');
        return view('backend.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        setLog(Article::class,'Creation d\'un article');
        $categories = Categorie::all();
        return view('backend.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {



        $file = $request->file('media');

        $data = [
            'titre' => $request->titre,
            'contenu' => $request->contenu,
             'categorie' => (integer)$request->categorie,
             'slug' => 'article-'.str_randomize(25).'-'.$request->titre,
             'image' => 'article-'.str_randomize(25).'-'.$file->getClientOriginalName(),
             'brouillon' => (integer)$request->brouillon,
             'auteur' => Auth::check() ? Auth::user()->id : 1

        ];


        if ($request->hasFile('media')) {
            $request->media->storeAs('public/articles',$data['image']);
        }
         if ( Article::create($data)) {
           session()->flash('message', tableName( Article::class).' ajouté avec succès, id = '.lastChild( Article::class));
           storeLog( Article::class);
           return redirect('articles');

       }
        createFailureLog( Article::class);
        return redirect('articles');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function gallerieAdd(Request $request)
    {



        $file = $request->file('media');

        $data = [
            'titre' => $request->titre,
             'slug' => 'article-'.str_randomize(25).'-'.$request->titre,
             'image' => 'article-'.str_randomize(25).'-'.$file->getClientOriginalName(),
             'brouillon' => 0,
             'auteur' => Auth::check() ? Auth::user()->id : 1,
             'gallerie' => (integer)$request->gallerie,

        ];


        if ($request->hasFile('media')) {
            $request->media->storeAs('public/gallerie',$data['image']);
        }
         if ( Article::create($data)) {
           session()->flash('message', tableName( Article::class).' ajouté avec succès, id = '.lastChild( Article::class));
           return redirect('gallerie');

       }
        return redirect('gallerie');
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

         if (Article::findOrFail($id))   {
            $article = Article::findOrFail($id);
            showLog(Article::class,$id);
            return view('backend.articles.show', compact('article'));
        }

        session()->flash('error', ' l\'arcticle n\'existe pas !');
        showFailureLog(Article::class,$id);
        return view('backEnd.admin.apropos.show', compact('apropos'));

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

         if (Article::findOrFail($id))   {
            $article = Article::findOrFail($id);
            editLog(Article::class,$id);
                   return view('backend.articles.edit', compact('article'));

        }

         editFailureLog(Article::class,$id);
         session()->flash('error', ' l\'arcticle n\'existe pas !');
         return view('backend.articles.index');

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

          if (Article::findOrFail($id)){
           $article =  Article::findOrFail($id);

           if ($article->update($request->all())){
               session()->flash('success', 'Resource mise à jours avec succès!');
               updateLog(Article::class,$id);
               return redirect('article');
           }
       }


        session()->flash('error', 'Echec mise à jours , l\'arcticle n\'existe pas !');
        updateFailureLog(Article::class,$id);
        return redirect('article');
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

         if (Article::findOrFail($id))   {
            $article = Article::findOrFail($id);
            $article->delete();
            session()->flash('success', 'mise à jours avec effectué avec succes!');
            deleteLog(Article::class,$id);
            return redirect('article');
        }

        session()->flash('error', 'Echec suppression , l\'arcticle n\'existe pas !');
        deleteFailureLog(Article::class,$id);
        return redirect('article');
    }

}
