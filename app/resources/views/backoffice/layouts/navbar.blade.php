<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">
                <i class="material-icons">visibility</i>
                {{ $currentEnvironment }} | {{ $userName }}
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">
                            {{ Lang::get('backoffice.general.profile') }}
                        </a>
                        <a class="dropdown-item" href="#">
                            {{ Lang::get('backoffice.general.settings') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('backoffice.logout') }}">
                            {{ Lang::get('backoffice.general.logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
