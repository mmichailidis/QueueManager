@extends('layouts.app')
@section('title' , '| Eπικοινωνία')
@section('content')
    <div class="image">
        <img src="{{URL::asset('/images/serres.jpg')}}" alt="profile Pic" style=width:100%;height:450px;">
        <div class="text">
            <h2>Καλώς ήρθατε στο Queue Manager!</h2>
        </div>
    </div>
    <div class="second-part">

        <section class="slick-content">
            <h3>Επιλέξτε παρακάτω την υπηρεσία από την οποία επιθυμείτε να πάρετε ηλεκτονικά το νούμερο σας...</h3>
            <div class="slider">
                <div><div class="slide-h3">
                        <a href="welcome.blade.php"><img src="pictures/bag.png" alt="" style="width:130px; height:130px;">
                        </a><h4>&#160;&#160;&#160;&#160;&#160;&#160;ΓΙΑΤΡΟΙ</h4></div></div>
                <div><div class="slide-h3">
                        <a href="welcome.blade.php"><img src="pictures/Bank.png" alt="" style="width:130px; height:130px;">
                        </a><h4>&#160;&#160;&#160;&#160;ΤΡΑΠΕΖΕΣ</h4></div></div>
                <div><div class="slide-h3">
                        <a href="welcome.blade.php"><img src="pictures/eforia.png" alt="" style="width:130px; height:130px;">
                        </a><h4>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;ΕΦΟΡΙΑ</h4></div></div>
                <div><div class="slide-h3">
                        <a href="welcome.blade.php"><img src="pictures/ika.png" alt="" style="width:130px; height:130px;">
                        </a><h4>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;ΙΚΑ</h4></div></div>
            </div>
        </section>
    </div>

    <section class="fourth-part">
        <div class="item">
            <ul class="thumbnails">
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>FOOD</h4>
                            <p>Burger, sandwich, souvlaki etc</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Entertainment</h4>
                            <p>Why. Liv etc</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Hello</h4>
                            <p>Hello world etc</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Goodnight</h4>
                            <p>Like bed nowhere etc</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </section>
@endsection
