<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Biblioateco</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/log.jpg" rel="icon">
  <link href="assets/img/log.jpg" rel="apple-touch-icon">

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
   video {
	 object-fit: cover;
	 width: 100vw;
	 height: 100vh;
	 position: fixed;
	 top: 0;
	 left: 0;
}
 html, body {
	 height: 100%;
}
 html {
	 font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	 font-size: 150%;
	 line-height: 1.4;
}
 body {
	 margin: 0;
}
 .viewport-header {
	 position: relative;
	 height: 100vh;
	 text-align: center;
	 display: flex;
	 align-items: center;
	 justify-content: center;
}
 h1 {
	 font-family: 'Syncopate', sans-serif;
	 color: #4a3a27;
	 text-transform: uppercase;
	 letter-spacing: 3vw;
	 line-height: 1.2;
	 font-size: 3vw;
	 text-align: center;
}
 h1 span {
	 display: block;
	 font-size: 10vw;
	 letter-spacing: -1.3vw;
}
 main {
	 display: none;
	 width: 80vw;
	 left: 10%;
	 height: 40vh;
	 overflow: auto;
	 background: rgba(0, 0, 0, 0.66);
	 color: white;
	 position: relative;
	 padding: 1rem;
}


   </style>

  @yield('css')

</head>

<body>



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
         var url =  "{!! url('')!!}" + '/newletter/create';
        axios.post(url,_data).then(
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
