@section('header')
    <!-- Header -->
    <header id="header" class="navbar fixed-top">
        <h1 id="logo"><a href="/" class="navbar-brand">弱勢數位學習關懷平台</a></h1>
        <nav id="nav">
            <ul>
                <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('rent.index') }}">設備租借</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a href="/volunteer">志工服務</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a href="/faq">常見問題</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a href="/dashboard" class="button primary">管理介面</a></li>
            </ul>
        </nav>
    </header>

@endsection
