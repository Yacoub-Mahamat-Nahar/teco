<?php

namespace App\Http\Controllers;

use App\APropo;
use App\Article;
use App\Carousel;
use App\CarouselCitation;
use App\Icon;
use App\Log;
use App\Logo;
use App\Media;
use App\MessageContact;
use App\Produit;
use App\Role;
use App\Service;
use App\Technologie;
use App\User;
use Illuminate\Http\Request;
use App\Contact;
use Session;
use App;
use App\Livre;
use Config;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('web');
    }

    public function index(Request $request)
    {
        $articles = Article::whereGallerie(null)->orderBy('id','desc')->get();
        $livres = Livre::orderBy('id','desc')->take(9)->get();

       if (!auth()->user()) {
        if (!session()->has('locale')){

          session()->put('locale',config('app.locale'));
          session()->put('locale', 'fr');
       }

        app()->setLocale(session('locale'));
        session()->put('locale', 'fr');
        setLog(Livre::class,'Accès à la liste de connexion');
        return view('auth.login', compact('articles','livres'));
       }
       setLog(Livre::class,'Accès à la liste page d\'acceuil');

       return view('web.home',compact('articles','livres'));
    }


}
