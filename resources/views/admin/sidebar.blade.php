@section('sidebar')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-database"></i>
            </div>
            <div class="sidebar-brand-text mx-3">管理介面</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>主控台</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            設備借用
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ (request()->is('dashboard/IT_eqpt/*')) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>審核</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">狀態</h6>
                    <a class="collapse-item {{ (request()->is('dashboard/IT_eqpt/waited_check')) ? 'active' : '' }}" href="{{ route('admin::waited_check') }}">待審核</a>
                    <a class="collapse-item {{ (request()->is('admin/cities')) ? 'active' : '' }}" href="{{ route('admin::finished_check') }}">已完成</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            志工服務
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard/Volunteer/waited_check" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>審核</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">尋找志工</h6>
                    <a class="collapse-item {{ (request()->is('dashboard/FindVolunteer/waited_check')) ? 'active' : '' }}" href="{{ route('FindVolunteer::waited_check') }}">待審核</a>
                    <a class="collapse-item {{ (request()->is('dashboard/FindVolunteer/finished_check')) ? 'active' : '' }}" href="{{ route('FindVolunteer::finished_check') }}">已審核</a>
                    <h6 class="collapse-header">志工培訓</h6>
                    <a class="collapse-item {{ (request()->is('dashboard/BeVolunteer/waited_check')) ? 'active' : '' }}" href="{{ route('BeVolunteer::waited_check') }}">待審核</a>
                    <a class="collapse-item {{ (request()->is('dashboard/BeVolunteer/finished_check')) ? 'active' : '' }}" href="{{ route('BeVolunteer::waited_level') }}">已審核</a>
                    <a class="collapse-item {{ (request()->is('dashboard/BeVolunteer/levelup')) ? 'active' : '' }}" href="{{ route('BeVolunteer::levelup') }}">已升正</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('system::system') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>系統服務</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('system::result') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>媒合結果</span></a>
        </li>

        {{-- <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
@endsection
