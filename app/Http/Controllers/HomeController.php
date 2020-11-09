<?php

namespace App\Http\Controllers;

use App\MessageContact;
use App\NewLetters;
use Illuminate\Http\Request;
use App;
use App\Article;
use App\Livre;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $livres = countElement(Livre::class);
         $articles = countElement(Article::class);
         $jouers = User::where('role',2)->count();
         $jouers_ad = User::where('role',2)->get();
        return view('home', compact('livres','articles','jouers','jouers_ad'));
    }


      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function forum(Request $request)
    {
        $langague = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        App::setLocale($langague);
        session()->put('locale', $langague);

        return view('web.forum');
    }

    public function messageFromUser(Request $request)
    {

      $data = [
        'nom' => $request->nom,
        'email' => $request->email,
        'sujet' => $request->sujet,
        'message' => $request->message
      ];

      if (MessageContact::create($data)) {
        storeLog(MessageContact::class);
          ///session()->flash('succes','Votre message a été envoyé avec succès, veuillez consulter votre boite email pour une eventuelle reponse');
        return response()->json(
            [
                'status' => true,
                'message' => 'Votre message a été envoyé avec succès, veuillez consulter votre boite email pour une eventuelle reponse'
            ]
        );

      }
      storeFailureLog(MessageContact::class);
      session()->flash('error','Erreur, veuillez recommencer svp !');
      return redirect('contacts');

    }


    public function newletter(Request $request)
    {

      $data = [
        'email' => $request->email,
         'slug' => 'new-letter-'.str_randomize(20)
      ];

      if (NewLetters::create($data)) {

        return response()->json(['message' => 'Vous etes inscrit dans le service de new letter avec succès', 'status'=> true]);

      }
      return response()->json(['message' => 'L\'inscription au new letter n\'a pas été effectué, réessayez scp!', 'status'=> false]);

    }

}
