@extends('admin.master')

<body id="page-top">
    @include('admin.sidebar')
    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div style="text-align: center; margin-top: 2rem">
                    <span><h2>當志工審核系統 - 已審核尚未通過考核</h2></span>
                    <div class="row">
                        <div class="card bg-{{ ($count < 5) ? 'success' : ''}}{{ ($count >= 5 && $count < 10) ? 'warning' : '' }}{{ ($count >= 10) ? 'danger' : '' }} text-white shadow" style="display: block; margin: auto; margin-bottom: 2rem; margin-top: 2rem">
                            <div class="card-body">
                                還剩 {{ $count }} 位未通過考核
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
                            <p class="card-text">連絡電話：{{ $user->phone }}</p>
                            <p class="card-text">開始日期：{{ $user->start_date }}</p>
                            <p class="card-text">結束日期：{{ $user->end_date }}</p>
                            <p class="card-text">可配合時間：{{ $user->period }}</p>

                            <p class="card-text">需求領域：{{ $user->field }}</p>
                            <p class="card-text">城市：{{ $user->city }}</p>
                            <p class="card-text">上傳時間：{{ $user->updated_at }}</p>
                            <br><br>
                            <button id="not_pass" class="card-img-bottom btn btn-danger"; text-align: center; margin="auto"; display="inline-block"; style="width:49%;" onclick="BeVolunteer_levelup_update_notpass('{{ $user->id }}')">不通過</button>
                            <button class="card-img-bottom btn btn-success"; text-align: center; style="width:49%;" margin="auto"; display="inline-block;" onclick="BeVolunteer_levelup_update_pass('{{ $user->id }}')" type="button">考核通過</button>
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
