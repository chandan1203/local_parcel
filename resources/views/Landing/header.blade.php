<section class="header">

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('image/home/logo.png') }}"  style="height: 20px;" > </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto header-navs-left">
                <li class="nav-item active ">
                    <a class="nav-link  " href="#"> <span  ><img  class="img-responsive" src="{{asset('image/icons/phone.png')}}" > </span> +88001875936621</a>
                </li>
            </ul>


            <ul class="navbar-nav  header-navs-right">
                <li class="nav-item active">
                    <a class="nav-link " href="#">Service </a>
                </li>

                @if(Auth::check())

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('logout')}}">Logout </a>
                </li>
    
                @else
           
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">Merchant Sign in </a>
                </li>
                @endif
                <li class="nav-item active">
                    <a class="nav-link create-btn" href="#"> Create Parcel </a>
                </li>

            </ul>
        </div>
    </nav>

</div>

</section>