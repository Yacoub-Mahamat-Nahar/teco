<?php



//Route::group(['middleware' => ['isAlreadyConnected']], function(){

        Route::get('/', 'DashboardController@index')->name('main');
        Auth::routes();
//});

Route::group(['middleware' => ['needlogin','language']], function () {

        Route::get('/nopermission', function (){
            return view('web.nopermission');
        })->name('nopermission');
        Route::post('logout-from-site','Auth\\RegisterController@logout')->name('logout-from-site');
        Route::get('/livre/{slug}','LivreController@showLivre')->name('livre-show');
        Route::get('/livre','LivreController@indexLivre')->name('livre-list');

        Route::resource('categories', 'CategorieController');
        Route::resource('categorie-article', 'CategorieArticleController');
        Route::resource('livres', 'LivreController');
        Route::resource('articles', 'ArticleController');
        Route::resource('newletters', 'NewLettersController');


        Route::get('/chat-private', function (){
            return view('web.chat');
        })->name('chat-private');

        Route::get('/chat-group', function (){
            return view('web.group');
        })->name('chat-group');
        Route::get('/web-api-categorie-resource', 'CategorieController@indexCollectionJson')->name('catreoursce');

        Route::post('web-api-message', 'HomeController@messageFromUser')->name('message.contact.create');
        Route::post('/newletter/create', 'HomeController@newletter')->name('newletter.create');
        Route::get('/web-api-messages', 'MessageController@index')->name('message');
        Route::get('/web-api-messages-to-private', 'MessageController@indexToPrivate')->name('message-to-private');
        Route::get('/web-api-load-livres/{slug}', 'LivreController@indexByCategorie');

        Route::get('/web-api-forum-message/{id}','MessageController@messageToForum');
        Route::get('/web-api-private-message/{id}','MessageController@messageToPrivate');

        Route::post('/web-api-forum/create', 'ChatOnlineController@store')->name('chat.create');



        Route::get('/forum', 'HomeController@forum')->name('forum');
        Route::get('/web-api-forum-message/{id}','MessageController@messageToForum');
        Route::get('/web-api-forum','ChatOnlineController@index');
        Route::post('/web-api-forum-message-store','MessageController@storeFromPrivate');
        Route::post('/web-api-forum-store','MessageController@storeFromForum');

        Route::post('/create-user','UserController@store')->name('user.store');
        Route::post('/get-login','LoginController@postLogin')->name('login-rewrite');
        Route::get('/web-api-livres','LivreController@indexJson');
        Route::get('/web-api-categorie','CategorieController@indexJson');

      Route::get('/my-profile', 'ProfileController@index')->name('myprofile');
      Route::get('/my-profile-password', 'ProfileController@password')->name('myprofile.password');
      Route::get('/my-profile-private-data', 'ProfileController@private')->name('myprofile.private');
      Route::get('/my-profile-picture', 'ProfileController@picture')->name('myprofile.picture');

      Route::post('profile-picture/store', 'MediaController@store')->name('profile.picture.store');
      Route::post('/password-modifiable', 'ProfileController@changeMyPassword');
      Route::post('/personnal-info-modifiable', 'ProfileController@changeMyPersonnalInformation');

      Route::get('/web-api-livres-by-categorie','LivreController@indexJson');




      Route::group(['middleware' => ['autorized']], function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/gallerie', 'UserController@gallerie')->name('gallerie');
        Route::get('/gallerie-add', 'UserController@gallerieAdd')->name('gallerie-ad');
        Route::post('/gallerie-add', 'ArticleController@gallerieAdd')->name('gallerie-add');
        Route::post('/livre-update/{id}', 'LivreController@update');


        Route::get('/bibliothecaire', 'UserController@bibliothecaire')->name('bibliothecaire');
              Route::get('/create-bibliothecaire', 'UserController@creteAdmin')->name('create-bibliothecaire');

        Route::get('/joueurs', 'UserController@joueurs')->name('joueurs');
        Route::get('/logs', function () {
            $logs = \App\Log::orderBy('id','desc')->get();
            return view('backend.logs.index',  compact('logs'));
        })->name('logs');

        Route::get('/chat', 'MessageController@chat')->name('chat');




    });

});






