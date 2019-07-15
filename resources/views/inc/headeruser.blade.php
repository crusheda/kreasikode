<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
        <a class="navbar-brand" href="">
            PT. Kreasi Kode </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToHasil()">
                <i class="material-icons">perm_identity</i>Output
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="scrollToShow()">
                    <i class="material-icons">settings</i>Penilaian
                </a>
            </li>
            <li class="dropdown nav-item">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">account_circle</i> Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ url('/admin') }}" class="dropdown-item">
                        <i class="material-icons">home</i>Laman Admin
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">last_page</i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>                      
                    @else
                    <a class="btn btn-rose" href="{{ route('admin.login') }}">
                        <i class="material-icons">chevron_right</i>Login<i class="material-icons">chevron_left</i></a>
                    @endauth
                </div>
            @endif
            </li>
        </ul>
        </div>
    </div>
</nav>