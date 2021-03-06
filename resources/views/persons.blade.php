@extends('layouts.app')

@section('content')
    <div class="container mt-2 mt-md-5">
        <div class="d-flex justify-content-between">
            <h1>Personen op zoek naar een co-house</h1>
            <img src="{{URL::asset('/images/icons/search-location-black.png')}}" class="header-icon">
        </div>
        <hr>
    </div>
    <div class="container d-md-flex p-0 mt-md-5">
        <div class="col-md-4 mt-2 mb-4 mb-md-0 mt-md-0" id="search-box">
            <div class="filters shadow-sm rounded p-3">
                <h4 class="header-dark p-3 rounded">Vind personen</h4>
                <hr>
                <form action="{{ url('/personen/filter') }}" method="post" class="mt-3" id="person-filter-1">
                    @csrf
                    {{ method_field('POST') }}

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                            <p class="search-title">Regio</p>
                        </div>
                        <select class="form-control" name="region">
                            <option>Eender</option>
                            <option>Antwerpen</option>
                            <option>Gent</option>
                            <option>Brugge</option>
                            <option>Leuven</option>
                            <option>Brussel</option>
                            <option>Bergen</option>
                            <option>Namen</option>
                            <option>Luik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                            <p class="search-title">Type huurwoning</p>
                        </div>
                        <select class="form-control" name="type_building">
                            <option>Eender</option>
                            <option>Appartement</option>
                            <option>Huis</option>
                            <option>Duplex</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                            <p class="search-title">Geslacht</p>
                        </div>
                        <select class="form-control" name="gender">
                            <option>Eender</option>
                            <option>Man</option>
                            <option>Vrouw</option>
                            <option>X</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                            <p class="search-title">Leeftijd</p>
                        </div>
                        <select class="form-control" name="age">
                            <option>Eender</option>
                            <option>15-20</option>
                            <option>20-25</option>
                            <option>25-30</option>
                            <option>35-40</option>
                            <option>> 40</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                            <p class="search-title">Budget <small>(maandelijks)</small></p>
                        </div>
                        <select class="form-control" name="budget">
                            <option>Eender</option>
                            <option>???200-300</option>
                            <option>???300-400</option>
                            <option>???400-500</option>
                            <option>???500-600</option>
                            <option>> ???600</option>
                        </select>
                    </div>

                    <div class="form-group"> 
                        <button class="btn search-btn w-100 mt-3"><span class="ml-3">Zoek</span></button> 
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            @if ( count($applications) > 0)
                @foreach ($applications as $application)
                    <div class="application-card shadow-sm rounded d-md-flex mb-4 p-3">
                        <div class="col-md-4">

                        @if ( strlen( $application->img_url) > 0)
                            <!-- <img class="img-fluid" src="{{$application->img_url }}" alt="Avatar"> -->
                            <img class="img-fluid" src="{{ URL::asset('storage/user_images/'. $application->img_url) }}" alt="Avatar">
                            @else
                            <small>Deze verhuurder heeft nog geen profielfoto</small>
                        @endif

                        </div>
                        <div class="col-md-8">
                            <h4 class="ml-0 mb-3 mt-3 mt-md-0">{{ $application->name }}</h4>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <span>{{ $application->location }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                                    <span>{{ $application->type_house }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <span>{{ $application->budget }}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                                    <span>{{ $application->gender }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                                    <span>{{ $application->age }} jaar</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                                    <span>{{ $application->start_date }}</span>
                                </div>    
                            </div>
                            
                            <p>{{  Str::limit($application->intro, 200) }}</p>

                            <div class="action-btns d-flex justify-content-between">
                                <a href="/profile/ {{ $application->user_id }}" class="save-btn action-link">Bekijk profiel</a>
                                <button class="save-btn action-link d-none">Contacteer</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="p-3">
                <h4>Sorry, geen personen gevonden op basis van jouw filter</h4>
            </div>    
            @endif
        </div>
    </div>
    
    <script>
        let check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);

        if(! check) {
            $(document).scroll( function(evt) {
                let currentTop = $(this).scrollTop();
                if(currentTop > 250) {
                    $('#search-box').css('transform', 'translateY(' + (currentTop - 230) + 'px)');
                }
                if(currentTop < 250) {
                    $('#search-box').css('transform', 'translateY(0px)');
                } 
            });
        }
    </script>
@endsection