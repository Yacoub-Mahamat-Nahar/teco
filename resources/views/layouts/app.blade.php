<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Biblioateco</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/log.png" rel="icon">
  <link href="assets/img/log.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ url('') }}/assets/css/app.css" rel="stylesheet">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

  <style>
      #footer .footer-newsletter form input[type="button"] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    border: 0;
    background: none;
    font-size: 16px;
    padding: 0 20px;
    background: #50aecb;
    color: #fff;
    transition: 0.3s;
    border-radius: 0 4px 4px 0;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}
  </style>

  @yield('css')

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">secretariat@institut-francais-tchad.org</a>
        <i class="icofont-phone"></i> +235 22 51 91 56

      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/ifTchad" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        @if (auth()->check())
        <a  href="javascript: void(0);">{!! auth()->user()->first_name !!} &nbsp;{!! auth()->user()->last_name !!} ({!! auth()->user()->getRole(auth()->user()->role)->name !!})</a>


            <a href="{{ url('/logout-from-site') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
               | Se Déconnecter
            </a>

            <form id="logout-form" action="{{ url('/logout-from-site') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


        @else
           <a  href="{{ url('login') }}" >Connexion</a>
        @endif
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <!-- <h1 class="logo mr-auto"><a href="index.html">BizLand<span>.</span></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href={{ url('') }}" class="logo mr-auto"><img src="{{ url('') }}/assets/img/log.png" alt=""></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/') }}#about">A Propos</a></li>
            <li ><a href="{{ url('/') }}#services">Livres</a>
            </li>
            <li><a href="{{ url('/') }}#portfolio">Galerie</a></li>
            <li class="active drop-down"><a href="javascript:void(0)">Forum</a>
              <ul>
                  <li><a href="{{ url('/forum') }}">Forum Général</a></li>
                  <li><a href="{{url('/chat-private')}}">Discussion privée</a></li>
                  <li><a href="{{url('/chat-group')}}">Chat Groupe</a></li>

              </ul>
            </li>          <li><a href="#contact">Contact</a>
            </li>

             @if (auth()->user())
             @if (auth()->user()->hasRole('Médiathécaire'))
                      <li><a href="{{ url('/home') }}">Tableau de bord</a></li>
                  @endif
             @endif


          </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


<section>
    @if(session()->has('success'))
          							@include('alert.alert_success')
          						@endif
          						@if(session()->has('error'))
          							<div class="alert alert-danger alert-dismissable">
          								@include('alert.alert_error')
          							</div>
                                  @endif


    @yield('content')


</section>  <!-- ======= Footer ======= -->


  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Abonnez-vous à notre carnet d'adresse</h4>
            <p>En vous abonnant à notre carnet d'adresse, vous recevrez par mail toutes les actualités sur l'IFT</p>
            <form action="" method="post">
                <input type="email" name="email" class="form-control subscribe-email"><input type="button" value="Abonnez-vous" class="subscribe">
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Instutut Français Tchad<span>.</span></h3>
            <p>
              Avenue Mobutu <br>
              1284 N'Djamena<br>
              Tchad <br><br>
              <strong>Téléphone:</strong> +235 22 51 91 56<br>
              <strong>Email:</strong> secretariat@institut-francais-tchad.org<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">A Propos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Derniers Articles</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Culturethèque</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Forum</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Activités</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Biblioteco</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Pages Sociales</h4>
            <p>Suivez-nous sur nos pages pour ne rater aucun de nos evenements</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
       {!! date('yy') !!} &copy; Copyright <strong><span>Institut Français Tchad</span></strong>. Tout droit réservé
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
       <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/counterup/counterup.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ url('') }}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('') }}/assets/js/main.js"></script>
  <script src="{{ url('') }}/js/sweetalert.js"></script>
  <script src="{{ url('') }}/js/toastr.min.js"></script>
  <script src="{{ url('') }}/js/axios.min.js"></script>

  <script src="  //cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script>


  $('.subscribe').on('click', function(){
        var email = $('.subscribe-email').val();
        var _data ={ email : email}
        axios.post('/newletter/create',_data).then(
            (response) => {
                if (response.data.status) {
                    toastr.success(response.data.message);
                }else{
                    toastr.warning(response.data.message);
                }
            }
        )
  });

  $('.launch-modal').on("click", function () {
        $('#Login').modal('show');
   });

   $('.contact').on("click", function () {
        var nom = $('.nom').val();
        var email = $('.email').val();
        var subject = $('.subject').val();
        var message = $('.message').val();

        var _data = {
                 nom : nom,
                 email : email,
                 subject : subject,
                 message : message
            }

            axios.post('/web-api-subscribe',email).then(
            (response) => {
                if (response.data.status) {
                    $('#success').modal('show');
                }
            }
        )


   });


   $('#suscribe').on("click", function () {
        toastr.success('personnal info updated !');

   });


  </script>

@yield('js')
</body>
</html>
