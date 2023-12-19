@extends('admin.master')

<body id="page-top">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style type="text/css" src="{{ asset('/assets/result.css') }}"></style>
    @include('admin.sidebar')
    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div class="animate__animated animate__bounceInDown" style="text-align: center; margin-top: 4rem">
                    <span>
                        <h2>媒合結果</h2>
                    </span>
                </div>
                <div class="row" style="margin-top: 5rem;">
                    @foreach ($find as $key => $user)
                    <div class="card col-6 animate__animated animate__backInUp" style="margin-bottom: 1rem">
                        <div class="card-body">
                            <h4 class="card-title"><b>學員 — {{ $user->name }}</b></h4>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">{{ $user->phone }}</p>
                            <h4 class="card-title"><b>志工 — {{ $be[$key]->name }}</b></h4>
                            <p class="card-text">{{ $be[$key]->email }}</p>
                            <p class="card-text">{{ $be[$key]->phone }}</p>
                            <hr>
                            <p class="card-text">需求領域：{{ $be[$key]->field }}</p>
                            <p class="card-text">城市：{{ $be[$key]->city }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endsection
        @include('admin.logout')
</body>
