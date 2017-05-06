@extends('layouts.app')
@section('title' , '| Eπικοινωνία')
@section('content')
    <style>
        .label-info{
            background-color: #222222;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <!-- foto for about Queue Manager-->
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ asset("images/Queue.jpg") }}" class="img-responsive" alt="Home"/></div>
                        </div>
                    </div>

                    <div class="details col-md-6">
                        <h3 class="product-title">Queue Manager</h3>
                        <div class="rating">
                            <div class="stars">
                                <!--stars-->
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>

                        <!-- About QueueManager-->
                        <p class="product-description">Queue Manager , η εφαρμογή που βάζει ένα τέλος στις ουρές αναμονής.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

<div> <br> <br> <br> </div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="span3">
                <div class="well">
                    <h2 class="text-info">Ζαγκουμίδης Ορέστης</h2>
                    <p><span class="label label-info">Back-End:</span></p>
                    <ul>
                        <li>Facebook: <a href="https://www.facebook.com/orestis.zagou?fref=ts">Orestis Zagkoumidis</a></li>
                        <li>Email: orestiszag@gmail.com</li>
                    </ul>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="span3">
                <div class="well">
                    <h2 class="text-info">Μιχαηλίδης Μιχάλης</h2>
                    <p><span class="label label-info">Back-End:</span></p>
                    <ul>
                        <li>Facebook: <a href="https://www.facebook.com/michael.michailidis.71">Michael Michailidis</a></li>
                        <li>Email: michailidimichael@gmail.com</li>
                    </ul>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="span3">
                    <div class="well">
                        <h2 class="text-info">Αυγέρη Κωνσταντίνα</h2>
                        <p><span class="label label-info">Front-End:</span></p>
                        <ul>
                            <li>Facebook: <a href="https://www.facebook.com/konstantina.avgeri.7">Konstantina Avgeri</a></li>
                            <li>Email: konavge93@gmail.com</li>
                        </ul>
                        <hr>
                        <hr>
                    </div>
                </div>
            </div>

        <div class="col-md-3">
            <div class="span3">
                <div class="well">
                    <h2 class="text-info">Φωτιάδου Ιωάννα</h2>
                    <p><span class="label label-info">Front-End:</span></p>
                    <ul>
                        <li>Facebook: <a href="https://www.facebook.com/profile.php?id=100008205004377">Iwanna Fwtiadoy</a></li>
                        <li>Email: iwanna.fwtiadoy@gmail.com</li>
                    </ul>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

