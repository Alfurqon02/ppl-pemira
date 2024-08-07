@php
use Illuminate\Support\Str;
@endphp

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            @if(isset($showSearchBox) && $showSearchBox)
            <form action="{{ route(Route::currentRouteName()) }}" method="GET" class="ms-md-3 pe-md-3 d-flex align-items-center">
                <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here..." name="search">
                    </div>
                </div>
            </form>
            @endif
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center px-3">
                    <a href="#" class="nav-link text-body p-0">
                        <span class="d-sm-inline d-none px-3 font-weight-bold">{{ Auth::user()->name }}</span>
                        @php
                        $userRole = App\Models\UserRole::where('user_id', Auth::id())->first();
                        $user = Auth::user();
                        @endphp
                        @if($userRole)
                            @if($userRole->role->name == 'admin_univ')
                                <span class="d-sm-inline d-none text-muted">Admin Universitas</span>
                            @elseif($userRole->role->name == 'admin_fakultas')
                                <span class="d-sm-inline d-none text-muted">Admin Fakultas ({{ $userRole->faculty ?? 'Nama Fakultas Tidak Tersedia' }})</span>
                            @elseif($userRole->role->name == 'superadmin')
                                <span class="d-sm-inline d-none text-muted">Super Admin</span>
                            @endif
                        @else
                            <span class="d-sm-inline d-none text-muted">Pemilih - {{ $user->faculty ?? 'Nama Fakultas Tidak Tersedia' }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item d-xl-none d-flex align-items-center pe-3">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <form class="mb-0" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-body font-weight-bold px-0 py-0" style="border: none; background: none;">
                            <i class="fa fa-sign-out-alt ms-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
