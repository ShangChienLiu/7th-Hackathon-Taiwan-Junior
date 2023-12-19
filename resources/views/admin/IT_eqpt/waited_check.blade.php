@extends('admin.master')

<body id="page-top">
    @include('admin.sidebar')
    {{-- @include('admin.dashboard') --}}
    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div style="text-align: center; margin-top: 2rem">
                    <span><h2>資訊設備借用系統 - 待審核</h2></span>
                    <div class="row">
                        <div class="card bg-{{ ($count < 5) ? 'success' : ''}}{{ ($count >= 5 && $count < 10) ? 'warning' : '' }}{{ ($count >= 10) ? 'danger' : '' }} text-white shadow" style="display: block; margin: auto; margin-bottom: 2rem; margin-top: 2rem">
                            <div class="card-body">
                                還剩 {{ $count }} 筆待處理
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($results as $user)
                    <div class="card col-6" style="margin-bottom: 1rem">
                        <div class="card-body">
                            <h4 class="card-title">{{ $user->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">出生日期：{{ $user->born }}</h6>
                            <p class="card-text">電子郵件：{{ $user->email }}</p>
                            <p class="card-text">租期：{{ $user->rent_period }} 天</p>
                            <p class="card-text">連絡電話：{{ $user->phone }}</p>
                            <p class="card-text">上傳時間：{{ $user->updated_at }}</p>
                            @if ($user->parent_name !== NULL && $user->parent_phone !== NULL && $user->parent_relation !== NULL)
                            <p class="card-text">監護人姓名：{{ $user->parent_name }}</p>
                            <p class="card-text">監護人電話：{{ $user->parent_phone }}</p>
                            <p class="card-text">與監護人關係：{{ $user->parent_relation }}</p>
                            @endif
                            <button class="card-img-bottom btn btn-primary"; text-align: center; onclick="window.open('https://hack.chyanweb.com/hackthon/{{ $user->data }}')">證明資料</button>
                            <br><br>
                            <button id="not_pass" class="card-img-bottom btn btn-danger"; text-align: center; margin="auto"; display="inline-block"; style="width:49%;" onclick="IT_eqpt_waited_check_update_notpass('{{ $user->id }}')">不通過</button>
                            <button class="card-img-bottom btn btn-success"; text-align: center; style="width:49%;" margin="auto"; display="inline-block;" onclick="IT_eqpt_waited_check_update_pass('{{ $user->id }}')" type="button">審核通過</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
    @include('admin.logout')
</body>

</html>
