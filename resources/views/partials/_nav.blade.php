<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset("images/logo.png") }}" class="img-responsive" alt="Home" style="width:150px;height:65px;"/>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            {{--<ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
            </ul>--}}

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <li><a href="{{route('categories.index')}}">Αρχική</a></li>
                    <li><a href="{{route('contact.about')}}">Σχετικά</a></li>
                    <li><a href="{{route('contact.index')}}">Επικοινωνία</a></li>
                @if (Auth::guest())
                    <li><a href="{{route('auth.login')}}">Σύνδεση</a></li>
                    <li><a href="{{route('auth.register')}}"><p class="navbar-btn"><button type="button" class="btn btn-success">Εγγραφή <span class="glyphicon glyphicon-log-in"></span></button> &nbsp;</p></a></li>
                @else
                    @if(\App\Http\Controllers\Helpers::isAdmin())
                        <li><a href="{{route('admin.employee.index')}}">Εργαζόμενοι</a></li>
                        @if(\App\Http\Controllers\Helpers::isVerificationRequired())
                            <li><a href="{{route('admin.member.index')}}">Πελάτες</a></li>
                        @endif
                            <li><a href="{{route('admin.job.index')}}">Εργασίες</a></li>
                            <li><a href="{{route('admin.show')}}">Η εταιρεία μου</a></li>
                        @elseif(\App\Http\Controllers\Helpers::isMember())
                            <li><a href="{{route('member.profile')}}">Το προφίλ μου</a></li>
                        @elseif(\App\Http\Controllers\Helpers::isEmployee())
                            <li><a href="{{route('employee.profile')}}">Το προφίλ μου</a></li>
                            <li><a href="{{route('employee.overview')}}">Η δουλειά μου</a></li>
                            <li><a href="{{route('employee.work')}}">Εργασία</a></li>
                        @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Αποσύνδεση</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
