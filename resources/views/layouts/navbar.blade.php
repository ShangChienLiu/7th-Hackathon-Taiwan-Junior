@section('navbar')
    <!-- Banner -->
    <section id="banner" style="background-image: url('@yield('background')')">
        <div class="content">
            <header>
                @yield('intro')
            </header>
            <span class="image"><img src="https://url.chyanweb.com/93c" alt="" /></span>
        </div>
        <a href="#one" class="goto-next scrolly" id="one">Next</a>
    </section>
@endsection
