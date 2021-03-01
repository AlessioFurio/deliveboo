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






@endsection
