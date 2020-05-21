<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helpdesk Fatec Jaú</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item @if(request()->is('admin/users')) active @endif ">
          <a class="nav-link" href="{{route('admin.users.index')}}">Usuários <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item @if(request()->is('admin/devices')) active @endif">
            <a class="nav-link" href="{{route('admin.devices.index')}}">Equipamentos <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item @if(request()->is('admin/places')) active @endif">
            <a class="nav-link" href="{{route('admin.places.index')}}">Laboratórios <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item @if(request()->is('admin/occurrencesType')) active @endif">
            <a class="nav-link" href="{{route('admin.occurrencesType.index')}}">Tipo Ocorrência <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item @if(request()->is('admin/occurrences')) active @endif">
            <a class="nav-link" href="{{route('admin.occurrences.index')}}">Ocorrências <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
      </ul>
      <div class="my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Sair</a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>


    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>