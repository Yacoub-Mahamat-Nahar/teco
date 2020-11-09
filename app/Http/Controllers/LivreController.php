<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Livre;
use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\Livre as LivreResource;
use Illuminate\Support\Str;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setLog(Livre::class,'Accès à la liste des livres');
        return view('backend.livres.index');

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLivre()
    {
        $livres = Livre::orderBy('id','desc')->get();
        setLog(Livre::class,'Accès à la liste des livres');
        return view('web.livres',compact('livres'));

    }


    public function showLivre($slug)
    {
       if (Livre::where('slug',$slug)->first()) {
          $livre = Livre::where('slug',$slug)->first();
          setLog(Livre::class,'Accès au livre '.$livre->titre);

          return view('web.livres-single',compact('livre'));
       }
       return redirect()->back();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson()
    {
        $livres = LivreResource::collection(Livre::orderBy('id','desc')->get());
        setLog(Livre::class,'Accès à la liste des livres');
        return response()->json(['livres' => $livres]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all(['id','nom']);
        setLog(Livre::class,'Accès à la page d\'enregistrement des livres');

       return view('backend.livres.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('media');
        $file_pdf = $request->file('fichier_pdf');

        $data = [
            'titre' => $request->titre,
            'resume' => $request->resume,
            'date_publication' => $request->date_publication,
             'categorie' => (integer)$request->categorie,
             'slug' => 'article-'.str_randomize(25).'-'.Str::slug($request->titre,'-'),
             'couverture' => 'livre-couverture-'.str_randomize(25).'.'.Str::slug($file->getClientOriginalName(),'-').'.'.$file->getClientOriginalExtension(),
             'fichier_pdf' => 'livre-pdf-'.str_randomize(25).'.'.Str::slug($file_pdf->getClientOriginalName(),'-').'.'.$file_pdf->getClientOriginalExtension(),
             'auteur' => $request->auteur,
             'livre_numerique' => $request->livre_numerique


        ];

        if ($request->hasFile('media') && $request->hasFile('fichier_pdf')|| ($request->hasFile('media') && !$request->hasFile('fichier_pdf'))|| (!$request->hasFile('media') && $request->hasFile('fichier_pdf'))
        ) {

            $request->media->move(public_path('uploads/livres'),$data['couverture']);
            $request->fichier_pdf->move(public_path('uploads/pdf'),$data['fichier_pdf']);

        }

        if ( Livre::create($data)) {
           session()->flash('message', tableName( Livre::class).' ajouté avec succès, id = '.lastChild(Livre::class));
           setLog(Livre::class,'Enregistrement d\'un livre');
           return redirect('livres');

       }
       setLog(Livre::class,'Echec d\'enregistrement d\'un livre');
       return redirect('livres/create');
    }


    public function update(Request $request,$id)
    {


         $id_ = (integer)$request->id;
        if (Livre::find($id_)) {

        $livre = Livre::find($id_);
        $couverture = $livre->couverture;
        $fichier_pdf= $livre->fichier_pdf;

        setLog(Livre::class,'Mise à jours du livre '.$livre->titre);


        if ($request->hasFile('media') && $request->hasFile('fichier_pdf')) {

            $file = $request->file('media');
            $file_pdf = $request->file('fichier_pdf');
            $couverture = 'livre-couverture-'.str_randomize(25).'.'.Str::slug($file->getClientOriginalName(),'-').'.'.$file->getClientOriginalExtension();
            $fichier_pdf = 'livre-pdf-'.str_randomize(25).'.'.Str::slug($file_pdf->getClientOriginalName(),'-').'.'.$file_pdf->getClientOriginalExtension();

        }else if ($request->hasFile('media') && !$request->hasFile('fichier_pdf')) {
            $file = $request->file('media');
            $couverture = 'livre-couverture-'.str_randomize(25).'.'.Str::slug($file->getClientOriginalName(),'-').'.'.$file->getClientOriginalExtension();

        }else if (!$request->hasFile('media') && $request->hasFile('fichier_pdf')) {
            $file_pdf = $request->file('fichier_pdf');
            $fichier_pdf = 'livre-pdf-'.str_randomize(25).'.'.Str::slug($file_pdf->getClientOriginalName(),'-').'.'.$file_pdf->getClientOriginalExtension();

        }
        $data = [
            'titre' => $request->titre,
            'resume' => $request->resume,
            'date_publication' => $request->date_publication,
             'categorie' => (integer)$request->categorie,
             'slug' => 'article-'.str_randomize(25).'-'.Str::slug($request->titre,'-'),
             'couverture' => $couverture,
             'fichier_pdf' => $fichier_pdf,
             'auteur' => $request->auteur,
             'livre_numerique' => $request->livre_numerique


        ];


            $livre->update($data);
           //session()->flash('message', tableName( Livre::class).' mise à jours ?, id = '.lastChild(Livre::class));
           //storeLog(Livre::class);
           return redirect('livres');

       }
       // createFailureLog(Livre::class);
        return redirect('livres/'.$id.'/edit');
    }

    public function indexByCategorie($id)
    {
      $categorie = Categorie::where('id',$id)->first();

      $livres = LivreResource::collection(Livre::where('categorie',$categorie->id)->orderBy('titre','asc')->get());

      return response()->json(['livres' => $livres, 'status' => true]);
    }
    public function destroy($id)
    {
        if(Livre::find($id)){
            $livre = Livre::find($id);
            $livre->delete();
            setLog(Livre::class,'Suppression du livre '.$livre->titre);

           return response()->json(['message'=> 'Le livre a été supprimé avec succès !', 'status' => true]);
        }

        return response()->json(['message'=> 'Le livre n\'existe pas ! , veuillez réessayer','status'=> false]);
    }

    public function edit($id)
    {
       if (Livre::find($id)) {
           $livre = Livre::find($id);
           $categories = Categorie::all();
           setLog(Livre::class,'Page de mise à jours du livre '.$livre->titre);

           return view('backend.livres.edit',compact('livre','categories'));
       }
    }



}
