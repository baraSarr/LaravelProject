<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/utilities.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/20e2995d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>@yield("title")</title>
    
    @section("css")
    @endsection
    <style>
        body {
            background-color: #E5E3C9;
            }
        .navbar-custom {
            padding: 0 24px;
            background-color: #fff;
            box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);
            min-height: 70px;
            position: fixed;
            left: 260px px;
            top: 0;
            right: 0;
            z-index: 1001;
        }
        </style>
</head>
<body>
    @guest
    <nav class="navbar navbar-expand-lg" style="background-color: #90A68D; color: #789395">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                    <img src="{{URL::asset('/image/esmt.jpeg')}}" alt="logo" width="30" height="24" class="d-inline-block align-text-top" style="color: #789395;">
                    E-learning
                  </a>
            <ul class="nav nav-pills" style="margin-left:50% ; margin-top: 0%;">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link text-white">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('newsletter')}}" class="nav-link text-white">Newsletter</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link text-white" aria-current="page">Inscription</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link text-white">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>
    @endguest
    @auth
    <nav class="navbar navbar-expand-lg" style="background-color: #90A68D; color: #789395">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
                    <img src="{{URL::asset('/image/esmt.jpeg')}}" alt="logo" width="30" height="24" class="d-inline-block align-text-top" style="color: #789395;">
                    E-learning
                  </a>
            <ul class="nav nav-pills" style="margin-right: 8%;">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link text-white">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('users.show',Auth::user()->id)}}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{route('users.dashboard',Auth::user()->id)}}">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a href="route('logout')" class="dropdown-item" onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    @endauth
    
        @yield("content")
    
    <div class="" style="margin-top: 10%;">
                <footer class="py-3 my-4" style="background-color: #90A68D; color: #789395">
                  <p class="nav justify-content-center  pb-3 mb-3">
                      <strong style="color: #FFFFFF;">E-learning</strong>
                  </p>
                  <p class="nav justify-content-center  pb-3 mb-3 text-white">
                      Rocade Fann Bel Air Dakar - Rond Point ONU - Colobane, Dakar</p>
                  <p class="nav justify-content-center pb-3 mb-3 text-white">+221 33 869 03 00 || http://www.esmt.sn/</p>
              
                  <p class="text-center text-muted text-white">&copy; 2022 e-learning, Inc</p>
                </footer>
              </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @section("js")
    @endsection
</body>
</html>