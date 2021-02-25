@extends('layouts.app-guest')
@section('chart-css')

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="contacts-flex">
        <h1>Get in Touch!</h1>
    </div>
    <div class="contacts-flex">
        <h2>Contatta uno dei nostri Web developer!</h2>
    </div>


    <div class="contacts-flex">
        <div class="contact-developer col-2">
            <i class="contact-developer fas fa-user"></i>
            <a href="#"><h2>Alessio Furio</h2></a>
            <a href="#">Linkedin</a>

        </div>
        <div class="contact-developer col-2">

            <i class="contact-developer fas fa-user"></i>
            <a href="#">
                <h2>Danilo Degortes</h2>
            </a>
            <a href="#">Linkedin</a>
        </div>

        <div class="contact-developer col-2">

            <i class="contact-developer fas fa-user"></i>
            <a href="#">
                <h2>Giacomo Di Michele</h2>
            </a>
            <a href="#">Linkedin</a>
        </div>

        <div class="contact-developer col-2">

            <i class="contact-developer fas fa-user"></i>
            <a href="#">
                <h2>Manuel De Vito</h2>
            </a>
            <a href="#">Linkedin</a>
        </div>

        <div class="contact-developer col-2">

            <i class="contact-developer fas fa-user"></i>
            <a href="#">
                <h2>Roberta Sciortino </h2>

            </a>
            <a href="#">Linkedin</a>
        </div>
    </div>





@endsection
