<!-- Sidenav Menu Start -->
<div class="sidenav-menu">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('assets/assets/images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('assets/assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('assets/assets/images/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('assets/assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>
    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Dashboard</li>

            @if (Auth::user()->role == '0')
                <li class="side-nav-item">
                    <a href="{{ route('users.create') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-person-fill-add"></i></span>
                        <span class="menu-text">Tạo người dùng </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('classrooms.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-building-fill"></i></span>
                        <span class="menu-text">Quản lý lớp học </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('students.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-file-earmark-person"></i></span>
                        <span class="menu-text">Quản lý sinh viên </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('teachers.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-file-person"></i></span>
                        <span class="menu-text">Quản lý giảng viên </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('subjects.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-book"></i></span>
                        <span class="menu-text">Quản lý môn học </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('schedules.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-calendar"></i></span>
                        <span class="menu-text">Quản lý thời khoá biểu </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('classrooms.showAutoAssign') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-calendar"></i></span>
                        <span class="menu-text">Xếp lớp </span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == '1')
                <li class="side-nav-item">
                    <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-card-list"></i></span>
                        <span class="menu-text">Lớp học đã đăng ký </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('student.classrooms') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="bi bi-card-list"></i></span>
                        <span class="menu-text">Danh sách lớp học </span>
                    </a>
                </li>
            @endif

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Sidenav Menu End -->
