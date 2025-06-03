<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Area Control Portofolio Fadli</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="i{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('profile.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('slug.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Slug</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('project.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Project</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('skils.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Skils</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('certificate.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sertificate</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personalskils.index') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Personal Skils</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
