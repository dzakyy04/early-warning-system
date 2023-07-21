<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'dashboard' ? '' : 'collapsed' }}"
                href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'dokumen' ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Dokumen</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>2023</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>2022</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dokumen2021.index') }}">
                        <i class="bi bi-circle"></i><span>2021</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dokumen2020.index')}}">
                        <i class="bi bi-circle"></i><span>2020</span>
                    </a>
                </li>
                <li>
                    <a href="components-buttons.html">
                        <i class="bi bi-circle"></i><span>2019</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'konseptor' ? '' : 'collapsed' }} "
                href="{{ route('konseptor.index') }}">
                <i class="bi bi-person"></i>
                <span>Konseptor</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'hari-libur' ? '' : 'collapsed' }} "
                href="{{ route('hari-libur.index') }}">
                <i class="bi bi-calendar-week"></i>
                <span>Hari libur</span>
            </a>
        </li>
    </ul>

</aside>
