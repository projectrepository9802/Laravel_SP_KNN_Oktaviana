<nav class="navbar navbar-expand-lg navbar-light bg-white bg-gradient">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ URL::to('/') }}">
            <img src="{{ URL::to('bin/images/server-solid.svg') }}" alt="" width="30" height="24"
                class="d-inline-block align-text-top branding">
            SP K-Nearest Neighbor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $navLink == 'beranda' ? 'active' : '' }}"
                        href="{{ URL::to('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navLink == 'diagnosa' ? 'active' : '' }}"
                        href="{{ URL::to('diagnosa') }}">Diagnosa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navLink == 'informasi' ? 'active' : '' }}"
                        href="{{ URL::to('informasi-penyakit') }}">Informasi</a>
                </li>
            </ul>
            {{-- <div class="d-flex">
                <a href="{{ URL::to('login') }}" class="btn btn-success fw-bold">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    LOGIN
                </a>
            </div> --}}
        </div>
    </div>
</nav>
