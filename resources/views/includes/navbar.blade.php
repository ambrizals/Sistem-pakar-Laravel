<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Sistem Pakar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('diagnosa.index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
    </div>

    <div class="my-2 my-lg-0">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @auth
            Panel
            @else
            Login
            @endauth
          </a>
          <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
            @auth
            <a class="dropdown-item" href="{{ route('tanaman.index') }}">Tanaman</a>
            <a class="dropdown-item" href="{{ route('daerah_gejala.index') }}">Daerah Gejala</a>
            <a class="dropdown-item" href="{{ route('penyakit.index') }}">Penyakit</a>
            <a class="dropdown-item" href="{{ route('gejala.index') }}">Gejala</a>
            @else
            <a class="dropdown-item" href="{{route('login') }}">Login</a>
            @endauth
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>