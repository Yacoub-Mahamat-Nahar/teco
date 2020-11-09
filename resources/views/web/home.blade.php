@extends('layouts.app')
@section('title')
    Accueil
@endsection
@section('css')
    <style>
         .icon > img {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }


         .icon {
            width: 100px;
            height: 100px;
            position: relative;
            border: 6px solid #eff2f7;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            width: 64px;
            height: 64px;
            border-radius: 4px;
            border: 1px solid #deebfd;
            display: flex;align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        /*--------------------------------------------------------------
# Clients
--------------------------------------------------------------*/
.clients {
  padding: 15px 0;
  text-align: center;
}

.clients img {
  max-width: 45%;
  transition: all 0.4s ease-in-out;
  display: inline-block;
  padding: 15px 0;
}

.clients img:hover {
  transform: scale(1.15);
}

@media (max-width: 768px) {
  .clients img {
    max-width: 40%;
  }
}
    </style>
@endsection
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>  <span>Jeux bientôt disponible ici...</span></br></br>

      </h1>
        {{--

          <div class="d-flex">
        <a href="" class="btn-get-started scrollto"> ACCEDEZ AU BIBLIOATECO</a>
      </div>

          --}}
    </div>
  </section><!-- End Hero -->
  <section id="clients" class="clients section-bg">
    <h2>Partenaires</h2>
      <div class="container" data-aos="zoom-in">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="#" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="#" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="storage/img/clients/tigo.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="storage/img/clients/alternaprod.jpg" class="img-fluid" alt=""></br>
            <h2 class="img-fluid">AlternaProd</h2>
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="#" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="#" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section>







    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>A Propos</h2>
          <h3>Apprenez d'avantage sur  <span> Biblioateco</span></h3>
          <p> L'idée est de faire un lien entre la pratique des lecteurs adhérents de la médiathèque et l’utilisation du
           numérique. </p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/img1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <p class="font-italic">
              Il serait donc intéressant de relier numérique et utilisation d’une médiathèque comme nous avons
                pu le voir afin de permettre une meilleure accessibilité du lieu et de rendre possible une nouvelle
                expérience d’utilisation du même lieu, transposé dans le Cloud, numérisé.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>

                  <p>L’utilisation du numérique est vecteur d’une meilleure communication entre les usagers. Comme cetespace est majoritairement silencieux afin de respecter la concentration générale, les échanges ne sefont pas systématiquement sur le contenu de ces multiples savoirs et divertissements.
</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>

                  <p>Dès lors, il s’agirait d’offrir le premier jeu vidéo d’utilisateurs d’une médiathèque d’Afrique et sans
doute à un bien plus large échelle.
</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Derniers Livres</h2>
        </div>

        <div class="row">



          @foreach ($livres as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon">
                <img src="uploads/livres/{{ $item->couverture }}" alt="" srcset="">
              </div>
              <h4><a href="">{{ $item->titre }}</a></h4>
              <p>{!! sous_chaine($item->resume, 0,25) !!} ...</p>
              <br>
            <a href="{{ url('livre/'.$item->slug)}}" class="btn btn-primary">Détail</a>
            </div>
          </div>
          @endforeach



        </div>
      </div>
      <br>
      <br>
        <div class="text-center">
            <a href="{{url('/livre')}}" class="btn btn-primary">Consulter tous les livres</a>
        </div>

    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Galerie</h2>
          <h3>Apprenez en image sur nos  <span>Activités Culturelles</span></h3>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tout</li>
              <li data-filter=".filter-app">Culturelles</li>
              <li data-filter=".filter-card">Evenements</li>
              <li data-filter=".filter-web">Autres</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Culture...</h4>
              <p>Culturelle</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Evenement...</h4>
              <p>Evenement</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Culture...</h4>
              <p>Culturelle</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Autre...</h4>
              <p>Autre</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Evenement...</h4>
              <p>Evenement</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Culture...</h4>
              <p>Culturelle</p>
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Autre...</h4>
              <p>Autre</p>
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Autre...</h4>
              <p>Autre</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Evenement...</h4>
              <p>Evenement</p>
              <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Nous Contactez</span></h3>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Notre Addresse</h3>
              <p>Avenue Mobutu, 1284 N'Djamena, Tchad</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Nous envoyez un mail</h3>
              <p>secretariat@institut-francais-tchad.org</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Nous applez</h3>
              <p>+235 22 51 91 56</p>
            </div>
          </div>

        </div>

        <div class="row" >

          <div class="col-lg-12">
            <form class="php-email-form" >

              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="nom" class="form-control nom" id="name"  />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control email" name="email"  />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control subject" name="subject" id="subject" placeholder="Objet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control message" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>

              <div class="text-center"><button type="button" class="contact">Envoyez</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


@endsection
