<header>
    <div class="container">
    {{-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">CV. SERBAGUNA BERSAR</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Kontak</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Produk
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Drum Kaleng</a></li>
                      <li><a class="dropdown-item" href="#">Drum Pelastik</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Palet Pelastik</a></li>
                      <li><a class="dropdown-item" href="#">Karung</a></li>
                      <li><a class="dropdown-item" href="#">Kardus</a></li>
                      <li><a class="dropdown-item" href="#">Drigen</a></li>
                      <li><a class="dropdown-item" href="#">Bag Container</a></li>
                      <li><a class="dropdown-item" href="#">Kempu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Service Kami</a>
                  </li>
                  <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Download</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Login</a>
                    @auth
                    {{ auth()->user()->name }}
                    <div class="text-end">
                        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-light me-2">Dashboard</a>
                    </div>
                    @endauth

                    @guest
                        <div class="text-end">
                            <a href="{{ route('login.perform') }}" class="btn btn-outline-success">Login</a>
                            {{--  <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>  --}}
                        </div>
                    @endguest
                </ul>
                {{-- <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
                
              </div>
            </div>
        </nav>
                
    </div>
    {{-- <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap">
            <a href="/" class="d-flex align-items-center mb-lg-0 text-decoration-none mb-2 text-white">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 mb-2">
                <li><a href="#" class="nav-link text-secondary px-2">Tentang Kami</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Produk</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Service Kami</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Kontak</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Download</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-lg-0 me-lg-3 mb-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..."
                    aria-label="Search">
            </form>

         
        </div>
    </div> --}}
</header>
