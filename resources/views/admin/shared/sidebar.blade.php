<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-folder fa-lg fa-fw"></i> Projects
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.technologies.index') }}">
                    <i class="fa-solid fa-folder fa-lg fa-fw"></i> Technologies
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-folder fa-lg fa-fw"></i> Types
                </a>
            </li>
        </ul>


    </div>
</nav>