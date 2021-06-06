<div class="account-nav mr-md-5">
    <ul class="list-group">
        <li class="list-group-item" id="link1">
            <a class="account-link"  href="{{ route('messages') }}">
                {{ __('Mijn berichten') }}
            </a>
        </li>
        <li class="list-group-item" id="link2">
            <a class="account-link" href="{{ route('myapplications') }}">
                {{ __('Mijn posts') }}
            </a>
        </li>
        <li class="list-group-item" id="link4">
            <a class="account-link" href="{{ route('myfavorites') }}">
                {{ __('Favorieten') }}
            </a>
        </li>
        <li class="list-group-item" id="link3">
            <a class="account-link" href="{{ route('user') }}">
                {{ __('Mijn profiel') }}
            </a>
        </li>
        <li class="list-group-item">
            <a class="account-link" href="{{ URL::to('/profile', Auth::user()->id) }}">
                {{ __('Bekijk mijn online profiel') }}
            </a>
        </li>
        <li class="list-group-item">
            <a class="account-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>  
    </ul>
</div>

<script type="application/javascript">
    let urlSlug10 = window.location.pathname;

    switch (urlSlug10) {
        case '/messages':
            $('#link1').addClass('active-link');
            break;
        case '/myapplications':
            $('#link2').addClass('active-link');
            break;
        case '/user':
            $('#link3').addClass('active-link');
            break;
        case '/myfavorites':
            $('#link4').addClass('active-link');
            break;
        default:
            break;
    }
</script>