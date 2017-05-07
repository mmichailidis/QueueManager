@extends('layouts.app')
@section('title' , '| Κατηγορίες')
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
            @foreach($categories as $category)
                @if($category->TypeOfCategory == 0)
                    <div><div class="slide-h3">
                            <a href="{{route('categories.show' , $category->Name)}}"><img src="{{URL::asset($category->Photo)}}" alt="" style="width:130px; height:130px;">
                            </a><h4>&#160;&#160;&#160;&#160;&#160;&#160;{{$category->Name}}</h4></div></div>
                    @endif
            @endforeach

            </div>
        </section>
    </div>

    <section class="slide-wrapper">

            <div id="myCarousel" class="carousel slide">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item item1 active">
                        <div class="fill" style=" background-color:#48c3af;">
                            <div class="inner-content">
                                <div class="carousel-img">
                                    <img src="{{URL::asset('/images/chat.png')}}" class="img img-responsive" alt="chatPic" style=width:20%;height:20%;">
                                </div>
                                <div class="carousel-desc">

                                    <h2>Live Chat</h2>
                                    <p>Τώρα μπορείτε μέσα από την εφαρμογή Queue Manager να συνομιλήσετε με την υπηρεσία που θέλετε για όποια πληροφορία χρειάζεστε χωρίς κόπο και άσκοπες διαδρομές που κουράζουν!</p>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </section>


@endsection
