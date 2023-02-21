<header>
    <nav class="navbar navbar-expand-xl navbar-light py-1">
        <div class="container-fluid">
            <a id="brand-black-mobile" class="navbar-brand d-xl-none mr-0" href="{{url('/')}}">
            <img class="img-fluid brand" src="{{url('redewe2m/images/brand-black.png')}}" alt="Connect Plug"
                title="ConnectPlug">
            </a>
            <a id="brand-blue-mobile" class="navbar-brand d-none d-xl-none mr-0" href="{{url('/')}}">
            <img class="img-fluid brand" src="{{url('redewe2m/images/brand-blue.png')}}" alt="Connect Plug"
                title="ConnectPlug">
            </a>
            <a class="btn btn-cplug-light d-block d-xl-none mr-md-auto ml-md-4 navbar-change-btn-light" href="{{url('/cadastre-se')}}">Teste grátis</a>
            <button id="toggle-menu" class="navbar-toggler text-white" type="button" data-toggle="collapse"
                data-target="#navbarCPlug" aria-controls="navbarCPlug" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCPlug">
                <ul class="navbar-nav mx-auto">
                    <a id="brand-black-desktop" class="navbar-brand d-none d-xl-block my-auto" href="{{url('/')}}">
                    <img class="img-fluid brand" src="{{url('redewe2m/images/brand-black.png')}}" alt="Connect Plug"
                        title="ConnectPlug">
                    </a>
                    <a id="brand-blue-desktop" class="navbar-brand d-none d-xl-none my-auto" href="{{url('/')}}">
                    <img class="img-fluid brand" src="{{url('redewe2m/images/brand-blue.png')}}" alt="Connect Plug"
                        title="ConnectPlug">
                    </a>
                    <li class="nav-item nav-item-navbar">
                        <div class="dropdown">
                            <a class="nav-link text-white mx-md-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sobre
                            </a>
                            <div class="dropdown-menu shadow-sm" id="about-dropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item text-center" href="{{url('/sobre')}}">A empresa</a>
                                <a class="dropdown-item text-center" href="{{url('/funcionalidades')}}">Funcionalidades</a>
                                <a class="dropdown-item text-center" href="{{url('/segmentos')}}">Segmentos</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item nav-item-navbar">
                        <a class="nav-link text-white mx-md-2" href="{{url('/planos')}}">Planos</a>
                    </li>
                    <li class="nav-item nav-item-navbar">
                        <a class="nav-link text-white mx-md-2" href="{{url('/auto-atendimento')}}">Autoatendimento</a>
                    </li>
                    <li class="nav-item nav-item-navbar nav-item-testimonials">
                        <a class="nav-link text-white mx-md-2" href="{{url('/depoimentos')}}">Depoimentos</a>
                    </li>
                    <li class="nav-item nav-item-navbar d-none d-xl-block">
                        <a class="nav-link btn btn-cplug-light navbar-change-btn-light mx-md-2" href="{{url('/cadastre-se')}}">Teste grátis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   </header>