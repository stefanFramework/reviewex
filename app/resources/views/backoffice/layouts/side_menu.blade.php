<ul class="nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('backoffice.home') }}">
            <i class="material-icons">accessible_forward</i>
            <p>{{ Lang::get('backoffice.general.home') }}</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('backoffice.companies') }}">
            <i class="material-icons">business</i>
            <p>{{ Lang::get('backoffice.home_form.companies_to_validate') }}</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('backoffice.reviews') }}">
            <i class="material-icons">task</i>
            <p>{{ Lang::get('backoffice.home_form.reviews_to_validate') }}</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('backoffice.logout') }}">
            <i class="material-icons">power_settings_new</i>
            <p>{{ Lang::get('backoffice.general.logout') }}</p>
        </a>
    </li>
</ul>

