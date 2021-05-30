<div class="account-nav">
    <ul class="list-group">
        <li class="list-group-item">
            <a class="account-link" href="{{ URL::to('/profile', Auth::user()->id) }}">
                {{ __('Bekijk mijn online profiel') }}
            </a>
        </li>
        <li class="list-group-item" id="link1">
            <a class="account-link" href="{{ route('myapplications') }}">
                {{ __('Mijn applicaties') }}
            </a>
        </li>
        <li class="list-group-item" id="link2">
            <a class="account-link" href="{{ route('user') }}">
                {{ __('Mijn profiel') }}
            </a>
        </li>
        <li class="list-group-item" id="link3">
            <a class="account-link" href="{{ route('myfavorites') }}">
                {{ __('Favorieten') }}
            </a>
        </li>
        <li class="list-group-item">
            <a class="account-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</div>

<script>
    let slug = window.location.pathname;

    switch (slug) {
        case '/myapplications':
            $('#link1').addClass('active-link');
            break;
        case '/user':
            $('#link2').addClass('active-link');
            break;
        case '/myfavorites':
            $('#link3').addClass('active-link');
            break;
        default:
            // code block
    }
</script>