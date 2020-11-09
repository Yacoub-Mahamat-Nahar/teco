
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') | Biblioateco </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png">
    <!-- Bootstrap core CSS -->
    <link href="{{ url('webs') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{ url('webs') }}/css/style.css" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="{{ url('webs') }}/font/flaticon.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{ url('webs') }}/css/plugin.css" rel="stylesheet" type="text/css">
    <!--Dashboard CSS-->
    <link href="{{ url('webs') }}/css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="{{ url('webs') }}/css/icons.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         .dashboard-nav{
        background-color: #50aecb;
        font-family: Times, 'Helvetica Neue', Helvetica, sans-serif
        font-size: 0.2cm
    }
    .dashboard-nav ul li a{
        color: #fff;
    }

    .dashboard-nav ul li{
        font-size:20px;
    }

    .dashboard-nav-inner{
        background-color: #50aecb;
        max-height: 600px;

    }

    .dashboard-nav ul li{
        border-color : #50aecb;
    }


    .add-listing-headline .gray {
      background: #50aecb;
      color: #ffffff;
    }

    .dashboard-list-box h4.gray {
    background-color: #50aecb;
    color: #fff;
}

.btn-primary {
    color: #fff;
    background-color: #50aecb;
    border-color: #50aecb;
}


.add-listing-headline {
    width: calc(100% + 60px);
    left: -30px;
    position: relative;
    padding: 15px 30px;
    margin: 0 0 30px 0;
    border-radius: 4px 4px 0 0;
    background-color: #50aecb;
    border-bottom: 1px solid #eaeaea;
}
    .file-upload-btn:hover {
            background: #50aecb;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #50aecb;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #50aecb;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }



        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #50aecb;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #053e8a;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .store-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #50aecb;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #50aecb;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }


        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }

        .store-image:hover {
            background: #50aecb;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .store-image:active {
            border: 0;
            transition: all .2s ease;
        }




         .avatar-preview > img {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }


         .avatar-preview {
            width: 100px;
            height: 100px;
            position: relative;
            border: 6px solid #eff2f7;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .content-left {
            margin: 0;
            background: #ffffff;
            color: #fff;
            padding: 21px 0px;
            width: 300px;
            text-align: center;
       }

    </style>
    @yield('css')
</head>
<body>
    <!-- Preloader -->

    <!-- Preloader Ends -->

    <!-- start Container Wrapper -->
    <div id="container-wrapper">
        <!-- Dashboard -->
        <div id="dashboard">

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

            <div class="dashboard-sticky-nav">
                <div class="content-left pull-left">
                    <a href="{{ url('dashboard') }}"><img src="{{ url('logo.png') }}" alt="logo"></a>
                </div>
                <div class="content-right pull-right">

                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="profile-sec">
                                <div class="dash-image">
                                    <img src="images/comment.jpg" alt="">
                                </div>
                                <div class="dash-content">
                                    <h4>{!! auth()->user()->first_name !!} &nbsp;{!! auth()->user()->last_name !!}</h4>
                                    <span>{!! auth()->user()->getRole(auth()->user()->roles->id)->name !!}</span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                                <li><a href="{{ route('myprofile') }}"><i class="sl sl-icon-user"></i>Profile</a></li>
                                <li><a href="{{ route('myprofile.password') }}"><i class="sl sl-icon-lock"></i>Changer le mot de passe</a></li>
                            </ul>

                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item">
                                <i class="sl sl-icon-envelope-open"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                        <h4> <a href="{{ route('chat') }}" style="color: #fff;">Lire les messages</a></h4>
                        <ul>

                        </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">
                    <ul>
                        <li><a href="{{ url('home') }}"><i class="sl sl-icon-speedometer"></i> Tableau de bord</a></li>

                        <li>
                            <a><i class="sl sl-icon-book-open"></i> Livres</a>
                            <ul>
                                <li><a href="{{ url('categories') }}">Categories </a></li>
                                <li><a href="{{ url('livres') }}">Livres </a></li>
                                {{--
                                     <li><a href="{{ url('') }}">Statistiques</a></li>
                                    --}}
                            </ul>
                        </li>
 {{--
                        <li>
                            <a><i class="sl sl-icon-layers"></i> Blog</a>
                            <ul>
                                <li><a href="{{ url('categorie-article') }}">Categories </a></li>
                                <li><a href="{{ url('articles') }}">Articles </a></li>

                                     <li><a href="{{ url('') }}">Statistiques</a></li>

                            </ul>
                             --}}
                        </li>

                        {{--
                                                    <li><a href="{{ url('gallerie') }}"><i class="sl sl-icon-picture"></i> Galerie d'image</a></li>

                            --}}
                        <li><a href="{{ url('newletters') }}"><i class="sl sl-icon-envolope-letter"></i> New letters</a></li>

                        <li>
                            <a><i class="sl sl-icon-user"></i> Utilisateurs</a>
                            <ul>
                                <li><a href="{{ url('bibliothecaire') }}">Bibliothécaires </a></li>
                                <li><a href="{{ url('joueurs') }}">Joueurs </a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('logs') }}"><i class="sl sl-icon-notebook"></i> Historiques</a></li>

                        <li>


                            <a href="{{ url('/logout-from-site') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">



                            <form id="logout-form" action="{{ url('/logout-from-site') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <i class="sl sl-icon-power"></i>
                            Logout
                        </a>
                        </li>


                        <br>
                        <br>
                        <br>
                        <br>
                        <hr style="border: 0.1px solid #ffffff;">
                        <li><a href="{{ url('') }}"><i class="sl sl-icon-link"></i>Revenir au Jeux</a></li>

                    </ul>
                </div>
            </div>
            <div class="dashboard-content">
                @yield('content')
            </div>

            <!-- Content / End -->
            <!-- Copyrights -->
            <div class="copyrights">
                <p> {!! date('yy') !!} <i class="fa fa-copyright" aria-hidden="true"></i> Institut Français Tchad. Tout droit réservé
                    </p>
            </div>
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- end Container Wrapper -->


    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->
    <script src="{{ url('webs') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('webs') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('webs') }}/js/preloader.js"></script>
    <script src="{{ url('webs') }}/js/plugin.js"></script>
    <script src="{{ url('webs') }}/js/main.js"></script>
    <script src="{{ url('webs') }}/js/dashboard-custom.js"></script>
    <script src="{{ url('webs') }}/js/jpanelmenu.min.js"></script>
    <script src="{{ url('webs') }}/js/counterup.min.js"></script>
    <script src="{{ url('') }}/js/sweetalert.js"></script>
    <script src="{{ url('') }}/js/toastr.min.js"></script>
    <script src="{{ url('') }}/js/axios.min.js"></script>

    @yield('js')

    <script>



        function readURL(input) {
      if (input.files && input.files[0]) {

          var reader = new FileReader();

          reader.onload = function(e) {
              $('.image-upload-wrap').hide();

              $('.file-upload-image').attr('src', e.target.result);
              $('.file-upload-content').show();

              $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);

      } else {
          removeUpload();
      }
  }

  function removeUpload() {
      $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
  });
  </script>
</body>
</html>
