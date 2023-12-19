@extends('admin.master')

<body id="page-top">
    @include('admin.sidebar')
    {{-- @include('admin.dashboard') --}}
    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div style="text-align: center; margin-top: 2rem">
                    <span>
                        <h2>尋找志工審核系統 - 已審核</h2>
                    </span>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>狀態</th>
                            <th>Name</th>
                            <th>出生日期</th>
                            <th>email</th>
                            <th>連絡電話</th>
                            <th>開始日期</th>
                            <th>結束日期</th>
                            <th>可配合時間</th>
                            <th>需求領域</th>
                            <th>城市</th>
                            <th>建檔日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $user)
                            <tr>
                                <td>{{ $user->progress == 2 || $user->progress == 1 ? 'O' : 'X' }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->born }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->start_date }}</td>
                                <td>{{ $user->end_date }}</td>
                                <td>{{ $user->period }}</td>
                                <td>{{ $user->field }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($results->count() > 0)
                    <nav>
                        <ul class="pagination" style="justify-content: center;">
                            <li class="page-item {{ $results->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $results->previousPageUrl() }}" tabindex="-1">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $results->LastPage(); $i++)
                                <li class="page-item {{ $results->CurrentPage() == $i ? 'active' : '' }}"><a
                                        class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{ $results->url($results->LastPage()) }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    @endsection
    @include('admin.logout')
</body>

</html>
