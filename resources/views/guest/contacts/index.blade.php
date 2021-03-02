@extends('layouts.app')
@section('chart-css')

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection

@section('content')
        <div class="row">
            <div class="contacts-flex text col-12">
                <h1>Get in Touch!</h1>
            </div>
            <div class="contacts-flex col-12">
                <h3>Contatta uno dei nostri Web developer!</h3>
            </div>


            <div class="contacts-flex group col-12">
                <div class="contact-developer col-12 col-md-4 col-lg-2">
                    <i class="contact-developer fas fa-user"></i>
                    <h4>Alessio Furio</h4>
                    <p>
                        <a href=""><i class="fa fa-envelope" id="i-email"></i>email</a>
                    </p>
                    <p>
                        <a href="{{ url('https://www.linkedin.com/in/alessio-furio-aa85341a1/') }}"><i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>
                </div>
                <div class="contact-developer col-12 col-md-4 col-lg-2">

                    <i class="contact-developer fas fa-user"></i>
                    <h4>Danilo Degortes</h4>
                    <p>
                        <a href=""><i class="fa fa-envelope" id="i-email"></i>email</a>
                    </p>
                    <p>
                        <a href="{{ url('https://www.linkedin.com/in/degortes/') }}"><i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>
                </div>

                <div class="contact-developer col-12 col-md-4 col-lg-2">

                    <i class="contact-developer fas fa-user"></i>
                    <h4>Giacomo Di Michele</h4>
                    <p>
                        <a href="#"><i class="fa fa-envelope" id="i-email"></i>email</a>
                    </p>
                    <p>
                        <a href="{{ url('https://www.linkedin.com/in/giacomo-di-michele-491834205/') }}"><i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>
                </div>

                <div class="contact-developer col-12 col-md-4 col-lg-2">

                    <i class="contact-developer fas fa-user"></i>
                    <h4>Manuel De Vito</h4>
                    <p>
                        <a href=""><i class="fa fa-envelope" id="i-email"></i>email</a>
                    </p>
                    <p>
                        <a href="{{ url('https://www.linkedin.com/in/manuel-de-vito-3bab94206/') }}"><i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>
                </div>

                <div class="contact-developer col-12 col-md-4 col-lg-2">

                    <i class="contact-developer fas fa-user"></i>
                    <h4>Roberta Sciortino </h4>
                    <p>
                        <a href=""><i class="fa fa-envelope" id="i-email"></i>email</a>
                    </p>
                    <p>
                        <a href="{{ url('https://www.linkedin.com/in/robertasciortino/') }}"><i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>

                </div>
            </div>

        </div>
        <div class="footer-project">
            <div class="container-project">
                <div class="languages-project">
                  <h5>Tecnologie e linguaggi utilizzati:</h5>
                  <ul>
                    <li><i class="fab fa-html5"></i> HTML 5 & CSS - SASS <i class="fab fa-sass"></i></li>
                    <li><i class="fab fa-bootstrap"></i> Bootstrap</li>
                    <li><i class="fab fa-js-square"></i> Javascript - Vue <i class="fab fa-vuejs"></i></li>
                    <li><i class="fab fa-php"></i> Php - Laravel <i class="fab fa-laravel"></i></li>
                    <li><i class="fas fa-database"></i> My Sql - SQL <i class="fas fa-database"></i></li>
                    <li></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="{{ asset('images/logo2.png') }}" alt="deliveboo-logo">
                  <h1>Deliveboo</h1>
                </div>
                <div class="container-social-online">
                  <h2 class="h2-proj">Progetto Github:</h2>
                  <div class="link-project">
                    <a href="{{ url('https://github.com/AlessioFurio/deliveboo') }}">Clicca qui <i class="fab fa-github"></i></a>
                  </div>
                </div>
            </div>
        </div>






@endsection
