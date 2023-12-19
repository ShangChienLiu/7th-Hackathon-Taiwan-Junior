@extends('admin.master')

<body id="page-top">
    @include('admin.sidebar')
    {{-- @include('admin.dashboard') --}}
    @section('wrapper')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container">
                <div style="text-align: center; margin-top: 2rem">
                    <span>
                        <h2>資訊設備借用系統 - 已審核</h2>
                    </span>
                </div>

                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>狀態</th>
                            <th>Name</th>
                            <th>出生日期</th>
                            <th>email</th>
                            <th>租期(天)</th>
                            <th>連絡電話</th>
                            <th>建檔日期</th>
                            <th>監護人姓名</th>
                            <th>監護人電話</th>
                            <th>與監護人關係</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $user)
                            <tr>
                                <td>{{ $user->progress == -1 ? 'X' : 'O' }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->born }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->rent_period }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->parent_name }}</td>
                                <td>{{ $user->parent_phone }}</td>
                                <td>{{ $user->parent_relation }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($results->hasPages())
                    <nav>
                        <ul class="pagination" style="justify-content: center;">
                            <li class="page-item {{ ($results->onFirstPage()) ? 'disabled' : ''}}">
                                <a class="page-link" href="{{ $results->previousPageUrl() }}" tabindex="-1">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $results->LastPage(); $i++)
                                <li class="page-item {{ $results->CurrentPage() == $i ? 'active' : '' }}"><a class="page-link"  href="{{ $results->url($i) }}">{{ $i }}</a></li>
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
