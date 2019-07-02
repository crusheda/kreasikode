<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('karyawan.index') }}">
                <i class="mdi mdi-clipboard-account menu-icon"></i>
                <span class="menu-title">Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('toHitung') }}">
                <i class="mdi mdi-code-braces menu-icon"></i>
                <span class="menu-title">Metode Mamdani</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.history') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">History</span>
            </a>
        </li>
    </ul>
</nav>