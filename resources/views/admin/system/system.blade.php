@extends('admin.master')

<body id="page-top">
    @include('admin.sidebar')
    {{-- @include('admin.dashboard') --}}
    @if (session('success') == '200')
    <script>alert('更新系統參數成功！')</script>
    @elseif (session('error') == '-1')
    <script>alert('更新系統參數失敗！')</script>
    @endif

    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div style="text-align: center; margin-top: 2rem">
                    <span>
                        <h2>系統設定</h2>
                    </span>
                </div>
                <div class="row">
                    <form action="/dashboard/system_config" method="POST">
                        <div class="card col-6" style="margin-bottom: 1rem">
                            <div class="card-body" style="text-align: center">
                                <h3 class="card-title">媒合時間</h3>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">一般開始</label>
                                <div class="col-10">
                                    <input class="form-control" name="normal_start" type="time" value="{{ getenv('NORMAL_START_TIME') }}">
                                </div>
                                <br><br>
                                <label class="col-2 col-form-label">一般結束</label>
                                <div class="col-10">
                                    <input class="form-control" name="normal_end" type="time" value="{{ getenv('NORMAL_END_TIME') }}">
                                </div>
                                <br><br>
                                <label class="col-2 col-form-label">弱勢開始</label>
                                <div class="col-10">
                                    <input class="form-control" name="disable_start" type="time" value="{{ getenv('DISABLE_START_TIME') }}">
                                </div>
                                <br><br>
                                <label class="col-2 col-form-label">弱勢結束</label>
                                <div class="col-10">
                                    <input class="form-control" name="disable_end" type="time" value="{{ getenv('DISABLE_END_TIME') }}">
                                </div>
                            </div>
                            <button class="btn btn-primary" style="text-align: center;">Confirm</button>
                            <br>
                        </div>
                </div>
                </form>
            </div>
        </div>
    @endsection
    @include('admin.logout')
</body>
