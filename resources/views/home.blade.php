@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 p-0">
    <div class="row d-flex landing-section">
        <div class="col-md-12 col-lg-8 left-column">
            <div class="row">      
                <h1 class="animatad-title">Vind co-house</h1>
                <div class="search-card">
                    <form action="https://co-housing-app-3i8mx.ondigitalocean.app/cohousings/filterhouses" method="GET" class="search-form mt-5 mb-5">
                        {{ method_field('GET') }}
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <p class="search-title">Locatie</p>
                                </div>
                                <select class="form-control" name="region">
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
                                    <option>Appartement</option>
                                    <option>Huis</option>
                                    <option>Duplex</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                                    <p class="search-title">Oppervlakte</p>
                                </div>
                                <select class="form-control" name="surface">
                                    <option>Eender</option>
                                    <option>10 - 20m²</option>
                                    <option>20 - 30m²</option>
                                    <option>30 - 40m²</option>
                                    <option>40 - 50m²</option>
                                    <option>> 50m²</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <p class="search-title">Budget</p>
                                </div>
                                <select class="form-control" name="budget">
                                    <option>Eender</option>
                                    <option>€300-400</option>
                                    <option>€400-500</option>
                                    <option>€500-600</option>
                                    <option>> €600</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                                    <p class="search-title">Aantal huisgenoten</p>
                                </div>
                                <select class="form-control" name="housemates">
                                    <option>Eender</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>> 5</option>
                                </select>
                            </div>

                            <div class="form-group mt-1">
                                <button class="btn search-btn"><span class="ml-3">Zoek</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 right-column" id="map-button">
            <div class="row">
                <a href="#map-frontpage"  class="text-decoration-none fixed-width-btn">
                    <div class="map-cta translate d-flex align-center dark-bg p-3 mb-5">
                        <img src="{{URL::asset('/images/icons/map.png')}}" class="map-icon">
                        <h2 class="m-0 ml-4">Bekijk de kaart met beschikbare co-housings</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="scroll-down d-flex justify-content-center w-100 mt-5">
            <img src="{{URL::asset('/images/icons/scroll-down.png')}}" id="scroll-icon" alt="scroll naar beneden" class="scroll-img">
        </div>
    </div>
</div>

<div class="container p-0 second-section pb-md-5" style="overflow:hidden">
    <div class="row d-flex justify-content-between center-row mt-4 mt-md-5">
        <div class="col-md-3 col-sm-12 promo-card text-center pt-4 pb-2 mb-4 mb-md-0 parallax">
            <div class="d-sm-flex d-md-block justify-content-sm-center align-items-sm-center">
                <div class="promo-logo">
                <svg version="1.0" class="promo-logo-image" xmlns="http://www.w3.org/2000/svg"
                    width="100px" viewBox="0 0 512.000000 512.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                    fill="#000000">
                    <path id="a1p2" d="M1640 5075 c-417 -68 -767 -245 -1059 -536 -270 -271 -443 -595 -522
                    -979 -21 -103 -24 -141 -24 -360 0 -219 3 -257 24 -360 168 -816 805 -1411
                    1627 -1520 150 -20 471 -8 616 23 758 165 1323 736 1479 1497 21 103 24 141
                    24 360 0 219 -3 257 -24 360 -157 762 -719 1331 -1479 1497 -103 22 -145 26
                    -347 29 -162 2 -255 -1 -315 -11z m415 -449 c50 -3 143 -19 207 -35 569 -143
                    990 -609 1077 -1188 16 -102 14 -322 -4 -428 -37 -230 -133 -453 -274 -640
                    -223 -293 -555 -492 -920 -551 -120 -19 -322 -19 -442 0 -356 57 -689 253
                    -903 531 -83 107 -115 160 -175 285 -91 190 -131 375 -131 600 0 237 41 414
                    144 625 192 392 536 668 961 771 100 24 285 44 345 38 14 -2 66 -5 115 -8z"/>
                    <path id="a1p3" d="M1733 4184 c-314 -68 -573 -331 -640 -648 -21 -102 -13 -297 17 -391
                    76 -242 279 -519 580 -793 150 -137 174 -152 230 -152 56 0 79 15 234 155 190
                    172 393 414 478 570 103 190 132 299 125 474 -5 141 -21 211 -73 320 -112 238
                    -331 413 -584 466 -88 18 -281 18 -367 -1z m306 -450 c104 -33 192 -112 239
                    -212 24 -50 27 -69 27 -162 0 -93 -3 -111 -27 -163 -35 -74 -121 -160 -195
                    -195 -52 -24 -70 -27 -163 -27 -99 0 -110 2 -171 32 -80 39 -150 111 -187 191
                    -24 50 -27 69 -27 162 0 93 3 112 27 162 84 180 290 272 477 212z"/>
                    <path id="a1p1" stroke="#000000" d="M3496 1966 c-85 -109 -233 -257 -342 -342 -52 -41 -81 -70 -77 -77
                    20 -33 1237 -1389 1266 -1411 51 -39 130 -53 203 -37 58 13 62 17 251 204 106
                    104 200 206 209 226 38 78 28 181 -23 249 -21 28 -1377 1245 -1410 1265 -7 4
                    -36 -25 -77 -77z"/>
                    </g>
                    </svg>
                </div>
                <div class="mt-3 d-sm-flex d-md-block ml-sm-3">
                    <h4 id="a1t1" class="white">Vind op locatie</h4>
                </div>
            </div>
            <div class="mt-3">
                <p class="white" id="a1t2">
                    Vind jouw geschike co-house familie. Gebruik de filters om de juiste locatie in te stellen en ga aan de slag!
                </p>
            </div>
            <div class="mt-3 mb-3">
                <a href="/cohousings"><button class="btn cta-white mt-xs-4 mt-md-0" id="a1t3">Vind huis</button></a>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 promo-card text-center pt-4 pb-2 mb-4 mb-md-0 parallax">
            <div class="d-sm-flex d-md-block justify-content-sm-center align-items-sm-center">
            <div class="promo-logo">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="promo-logo-img" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                    <g id="spin-box" transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path id="a2p4" d="M2165 3969 c-319 -231 -581 -426 -583 -433 -2 -8 90 -301 203 -653
                113 -351 213 -659 221 -686 l16 -47 736 2 736 3 223 680 c123 374 222 686 221
                694 -4 18 -1158 861 -1178 860 -8 0 -276 -189 -595 -420z m1096 -135 c269
                -197 489 -362 489 -368 0 -7 -85 -270 -189 -586 l-188 -575 -87 0 c-47 0 -324
                2 -616 3 l-529 2 -85 263 c-47 144 -132 407 -189 583 l-104 322 495 356 c272
                196 499 356 504 356 5 0 229 -160 499 -356z" />
                        <path stroke="#000000" id="a2p3" d="M3801 1909 c-18 -6 -52 -22 -75 -36 -54 -35 -176 -133 -176 -143 0
                -4 7 -13 15 -20 9 -7 32 -39 51 -71 l36 -58 182 156 c99 86 182 159 184 163 8
                20 -155 26 -217 9z" />
                        <path id="a2p2" d="M4265 1891 c-42 -20 -143 -100 -335 -266 -151 -130 -289 -243 -307
                -251 -26 -11 -109 -14 -428 -14 l-395 0 0 80 0 80 355 0 c195 0 355 3 355 6 0
                13 -25 52 -54 82 -63 68 -53 66 -466 72 l-375 5 -100 51 c-151 78 -216 96
                -372 102 -239 8 -350 -32 -647 -235 -43 -29 -111 -72 -152 -94 l-73 -40 161
                -323 161 -322 89 38 c188 81 413 118 602 99 57 -6 166 -25 242 -42 182 -42
                400 -51 551 -24 219 39 354 103 624 292 718 506 849 599 849 609 0 20 -45 78
                -79 101 -50 34 -128 32 -206 -6z" />
                        <path id="a2p1" d="M785 1571 c-110 -49 -199 -93 -198 -99 4 -18 554 -1186 564 -1196 8
                -9 428 222 429 237 0 20 -572 1147 -583 1146 -6 0 -102 -40 -212 -88z" />
                    </g>
                </svg>
            </div>
            <div class="mt-3 d-sm-flex d-md-block ml-sm-3">
                <h4 class="white" id="a2t1">Bied aan</h4>
            </div>
    </div>
            
            <div class="mt-3">
                <p class="white "id="a2t2">
                    Op zoek naar een nieuwe housemate? Plaats een zoekertje en kom met de geschikte persoon in contact!
                </p>
            </div>
            <div class="mt-3 mb-3">
            <a href="/personen"><button class="btn cta-white mt-xs-4 mt-md-0" id="a3t3">Vind housemate</button></a>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 promo-card text-center pt-4 pb-2 mb-4 mb-md-0 parallax">
            <div class="d-sm-flex d-md-block justify-content-sm-center align-items-sm-center">
                <div class="promo-logo">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                     height="100px" viewBox="0 0 512.000000 512.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                    fill="#000000" stroke="none">
                    <path id="a3p1" d="M840 5111 c-51 -16 -106 -50 -146 -90 -103 -105 -128 -255 -65 -397
                    28 -61 110 -139 171 -161 l50 -18 0 -215 0 -216 -91 -17 c-306 -58 -570 -274
                    -692 -567 -55 -133 -62 -176 -61 -365 0 -156 2 -177 28 -260 119 -389 450
                    -650 853 -672 276 -15 524 80 717 273 121 120 214 283 247 432 8 34 17 51 25
                    48 6 -2 91 -66 188 -142 131 -102 175 -142 171 -153 -15 -38 -22 -120 -15
                    -168 17 -106 67 -183 155 -238 234 -147 527 14 527 290 0 138 -74 254 -197
                    312 -51 24 -73 28 -145 28 -76 0 -93 -4 -148 -31 l-62 -30 -232 180 -232 181
                    -16 100 c-10 55 -27 129 -39 165 -26 76 -90 198 -131 250 l-28 36 189 162
                    c104 90 193 160 198 158 5 -3 12 -23 16 -43 4 -21 22 -76 42 -123 110 -268
                    344 -473 631 -552 64 -18 104 -22 242 -22 150 0 173 3 253 27 48 15 119 43
                    157 62 38 19 72 35 75 35 2 0 88 -111 190 -247 l186 -247 -73 -26 c-309 -109
                    -546 -385 -609 -710 -25 -128 -13 -333 27 -462 4 -13 -36 -48 -162 -142 l-167
                    -126 -39 60 c-85 130 -252 269 -398 331 -142 60 -211 73 -380 74 -131 0 -168
                    -4 -239 -23 -265 -72 -469 -235 -596 -475 -47 -89 -89 -212 -100 -294 l-7 -53
                    -219 0 c-170 0 -219 3 -219 13 0 23 -46 98 -85 138 -63 65 -125 92 -225 97
                    -116 5 -184 -19 -261 -97 -78 -77 -102 -145 -97 -261 4 -66 10 -96 30 -135
                    110 -213 392 -256 558 -85 31 31 56 70 67 100 l18 50 215 0 216 0 17 -91 c69
                    -367 370 -671 736 -745 126 -25 335 -16 456 20 234 70 432 228 554 441 39 68
                    91 199 91 230 0 8 2 15 4 15 5 0 537 -258 542 -263 2 -1 0 -28 -5 -58 -25
                    -152 53 -303 189 -368 47 -22 68 -26 150 -26 82 0 103 4 150 26 212 101 260
                    387 93 555 -114 113 -308 133 -434 43 l-30 -21 -312 151 -312 151 -7 93 c-4
                    50 -16 125 -26 165 l-19 72 136 102 c75 56 150 112 167 125 l31 23 38 -57
                    c126 -190 318 -322 565 -390 102 -27 338 -24 450 6 209 56 385 173 515 342
                    206 266 251 639 115 950 -139 315 -432 526 -776 559 -59 5 -110 8 -114 5 -4
                    -3 -106 127 -227 288 l-219 292 44 45 c135 138 213 303 259 547 l8 43 255
                    -124 c210 -102 254 -127 252 -142 -2 -11 -3 -55 -4 -100 -1 -68 3 -90 26 -140
                    123 -269 497 -272 628 -5 19 38 23 62 23 146 0 86 -3 107 -24 150 -33 66 -100
                    131 -169 163 -48 23 -71 27 -143 27 -77 0 -92 -3 -156 -35 l-71 -35 -308 148
                    c-170 82 -312 152 -316 156 -4 4 -17 41 -27 84 -84 328 -335 584 -666 679 -70
                    20 -102 23 -250 23 -129 -1 -185 -5 -231 -18 -280 -78 -511 -272 -626 -524
                    -37 -81 -78 -239 -78 -298 l0 -43 -238 -204 c-130 -111 -245 -209 -254 -217
                    -15 -11 -23 -9 -57 18 -96 76 -294 159 -418 176 l-53 7 0 219 c0 170 3 219 13
                    219 23 0 98 46 138 85 65 63 92 125 97 225 5 116 -19 184 -97 261 -71 72 -140
                    99 -244 98 -40 0 -83 -4 -97 -8z m181 -194 c78 -53 101 -140 57 -219 -54 -95
                    -177 -111 -254 -34 -58 58 -65 152 -16 213 51 63 150 82 213 40z m2145 3 c483
                    -122 722 -650 493 -1090 -35 -69 -127 -191 -148 -198 -5 -2 -10 23 -13 55 -8
                    105 -68 187 -165 223 -49 18 -78 20 -347 20 -331 0 -353 -4 -430 -71 -51 -45
                    -86 -123 -86 -192 l-1 -42 -49 53 c-104 111 -171 262 -189 425 -43 378 218
                    739 594 822 93 21 248 18 341 -5z m1688 -1023 c56 -31 79 -67 84 -130 5 -64
                    -12 -104 -63 -142 -66 -51 -159 -42 -214 20 -58 67 -60 149 -4 216 51 61 129
                    75 197 36z m-3749 -82 c40 -8 115 -37 175 -66 90 -45 117 -64 190 -138 166
                    -168 238 -349 227 -571 -10 -178 -59 -309 -169 -447 l-63 -78 -12 67 c-19 106
                    -55 159 -135 204 l-53 29 -308 3 c-346 3 -371 0 -445 -63 -50 -43 -79 -102
                    -88 -178 l-7 -58 -25 23 c-79 74 -169 242 -197 372 -26 115 -17 283 19 391 66
                    196 227 377 408 460 136 62 328 82 483 50z m2168 -77 c40 -21 46 -39 47 -141
                    l0 -98 -44 -19 c-90 -40 -167 -55 -291 -54 -124 0 -195 13 -290 54 l-45 19 0
                    93 c0 100 11 131 54 148 33 14 543 12 569 -2z m967 -1029 c85 -14 195 -60 286
                    -121 259 -173 386 -505 309 -809 -25 -99 -98 -238 -163 -309 l-57 -64 -6 60
                    c-10 105 -61 177 -156 221 -52 24 -53 24 -370 21 -304 -3 -320 -4 -358 -25
                    -86 -46 -144 -138 -145 -228 l-1 -50 -52 57 c-70 76 -130 184 -162 293 -33
                    111 -38 269 -11 379 22 91 82 216 141 295 98 129 276 241 435 275 121 25 172
                    26 310 5z m-3010 -84 c38 -20 52 -68 48 -164 l-3 -75 -75 -27 c-183 -66 -389
                    -61 -562 15 l-38 16 0 88 c0 95 12 130 50 149 39 20 541 18 580 -2z m1425 -19
                    c88 -67 91 -187 5 -259 -102 -86 -262 -8 -262 128 0 134 152 211 257 131z
                    m-457 -922 c410 -84 680 -487 596 -892 -28 -137 -90 -261 -182 -363 l-47 -53
                    -6 72 c-4 58 -11 80 -35 114 -42 60 -104 104 -164 117 -67 14 -553 14 -620 0
                    -111 -24 -195 -120 -207 -236 l-6 -57 -51 56 c-120 131 -176 275 -183 463 -6
                    158 11 238 78 375 45 90 64 117 138 190 90 89 159 135 262 177 131 53 284 66
                    427 37z m2185 -166 c40 -21 46 -39 47 -141 l0 -98 -47 -20 c-84 -37 -228 -62
                    -320 -56 -90 6 -194 29 -260 58 l-43 18 0 96 c0 93 1 98 29 126 l29 29 272 0
                    c187 0 278 -4 293 -12z m-3964 -438 c96 -49 115 -178 37 -256 -77 -77 -200
                    -61 -254 34 -44 79 -21 166 57 219 43 29 108 30 160 3z m1935 -599 c25 -23 26
                    -30 26 -127 l0 -103 -57 -21 c-179 -67 -378 -67 -555 2 l-58 23 0 87 c0 48 6
                    99 12 114 23 50 49 54 340 51 l266 -2 26 -24z m1573 -2 c73 -45 96 -141 53
                    -217 -61 -108 -219 -108 -280 0 -83 148 82 306 227 217z"/>
                    <path id="a3p2" d="M2859 4756 c-32 -12 -70 -33 -85 -45 -202 -159 -164 -480 69 -587
                    172 -78 376 -4 455 166 31 66 40 169 21 238 -53 197 -273 306 -460 228z m218
                    -182 c45 -34 66 -70 71 -123 9 -102 -82 -192 -182 -177 -75 12 -146 91 -146
                    163 0 47 42 115 86 141 48 28 130 26 171 -4z"/>
                    <path id="a3p3" d="M806 3645 c-184 -75 -261 -280 -177 -470 23 -52 94 -126 148 -153
                    170 -87 382 -19 469 150 40 76 45 199 13 283 -30 81 -112 164 -192 193 -81 31
                    -182 30 -261 -3z m215 -178 c125 -84 98 -258 -46 -298 -108 -30 -221 82 -196
                    192 25 108 155 165 242 106z"/>
                    <path id="a3p4" d="M3985 2548 c-49 -17 -131 -76 -160 -114 -51 -67 -69 -122 -70 -214 0
                    -72 4 -94 26 -141 107 -227 400 -276 568 -94 56 61 83 124 89 207 11 155 -77
                    295 -218 349 -56 21 -184 25 -235 7z m184 -183 c99 -51 120 -178 42 -256 -71
                    -72 -164 -71 -233 2 -59 62 -61 144 -6 214 41 52 137 72 197 40z"/>
                    <path id="a3p5" d="M1950 1526 c-95 -27 -173 -96 -216 -191 -23 -50 -28 -74 -28 -140 0
                    -103 34 -184 106 -251 74 -69 125 -89 233 -89 82 0 96 3 157 33 73 36 119 82
                    158 159 22 42 25 61 25 148 0 87 -3 106 -25 149 -35 69 -101 133 -167 163 -67
                    31 -174 39 -243 19z m174 -189 c54 -30 78 -67 83 -124 10 -95 -52 -172 -145
                    -180 -58 -5 -103 17 -146 70 -25 32 -30 47 -30 92 0 45 5 60 30 92 58 73 136
                    92 208 50z"/>
                    </g>
                </svg>

                </div>
                <div class="mt-3  d-sm-flex d-md-block ml-sm-4">
                    <h4 class="white" id="a3t1">Connecteer</h4>
                </div>
            </div>
            <div class="mt-3">
                <p class="white" id="a3t2">
                    Ons platform connecteert alle mensen die actief zijn om te co-housen! Vind en connecteer met mensen.
                </p>
            </div>
            <div class="mt-3 mb-3">
                <a href="/application"><button class="btn cta-white" id="a3t3">Leg connecties</button></a>
            </div>
        </div>
    </div>
    
</div>
<div class="container-fluid mt-2 mt-md-0">
    <div class="row d-flex third-section justify-content-center">
        <div class="make-account-box">
            <a href="/register" class="text-decoration-none">
                <h4 class="white m-0">Maak een account</h4>
            </a>
        </div>
        <div class="make-account-text d-flex">
            <span class="arrows-left white ml-3">
                < < </span>
                    <span class="arrows-text font-italic white ml-3">
                        Maak een account en ga aan de slag
                    </span>
        </div>
        <div id="particles-js"></div>
    </div>
</div>

<div class="container fifth-section mt-5 mb-5 p-0">
    <div class="d-flex align-center">
        <img src="{{URL::asset('/images/icons/map-grey.png')}}" alt="statistieken" class="stat-icon ml-3 ml-md-0">
        <h2 class="mb-0 ml-4 grey-text-header">Kaart met beschikbare co-housings</h2>
    </div>
    <div id="map-frontpage" class="mt-4">

    </div>
</div>

<div class="container sixth-section p-0">
    <div class="d-flex align-center">
        <img src="{{URL::asset('/images/icons/person-search.png')}}" alt="statistieken" class="stat-icon ml-3 ml-md-0">
        <h2 class="mb-0 ml-4 grey-text-header">Personen op zoek naar een co-house</h2>
    </div>
    <div class="mt-4 user-box-wrapper">
        <div class="user-box col-md-12 col-lg-6" id="user-box-1">
        </div>
        <div class="user-box col-md-12 col-lg-6" id="user-box-2">
        </div>
    </div>
</div>

<div class="container mt-5 fourth-section p-sm-2 p-md-0">
    <div class="d-flex align-center">
        <img src="{{URL::asset('/images/icons/stats-grey.png')}}" alt="statistieken" class="stat-icon">
        <h2 class="mb-0 ml-4 grey-text-header">Statistieken</h2>
    </div>
    <div class="d-sm-block d-md-flex justify-content-md-between mt-4">
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/users.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white mb-0 ml-3">{{$total_users}} gebruikers</h4>
            </div>
        </div>
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/house.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white mb-0 ml-3">{{$total_houses}} huizen</h4>
            </div>
        </div>
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/speech-bubble.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white mb-0 ml-3">{{$total_connections}} connecties</h4>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOI5IIhJ3yW2ZIApd_bq9K_xP9a7Q6vE0"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.1/dist/simpleParallax.min.js"></script>

<script type="application/javascript">
    // Get the javascript map and locations
    $(document).ready(function() {
        let check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        
        if( ! check) {
            const parallax2 = document.getElementById('map-button')
            new simpleParallax(parallax2, {
                delay: 0,
                orientation: 'down',
                scale: 2,
                overflow: true,
            });

            const parallax = document.getElementsByClassName('parallax')
            new simpleParallax(parallax, {
                delay: 0,
                orientation: 'down',
                scale: 2,
                overflow: true,
            });
        }

        let map;
        var stylesArray = [
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{ "color": "#CCFFFF" }]
            }
        ]
        initMap();

        function initMap() {
            var mapOptions = {
                center: new google.maps.LatLng(50.8465573, 4.351697),
                zoom: 8,
                mapId: 'dark',
                styles: stylesArray
            }

            map = new google.maps.Map(document.getElementById("map-frontpage"), mapOptions);
        }

        // Google map
        let coordinates = [];

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: "https://co-housing-app-3i8mx.ondigitalocean.app/getcoordinates",

            success: function(response) {
                coordinates = response;

                coordinates.forEach(function(coordinates) {
                    const marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(coordinates.lat),
                            lng: parseFloat(coordinates.long)
                        },
                        icon: '/images/icons/marker-logo.png',
                        map: map,
                    });
                    marker.addListener("click", () => {
                        $.ajax({
                            type: 'POST',
                            url: "https://co-housing-app-3i8mx.ondigitalocean.app/getmarkerdata",
                            data: {
                                id: coordinates.id
                            },

                            success: function(response) {
                                let urlString = window.location.host + "/storage/house_images/";
                                let imagesArray = [];
                                let images = JSON.stringify(response[0])
                                let imageString = images.split(',');
                                

                                imageString.forEach(function(item, index) {
                                    let newString = item.replace(/\\/g, '').replace('{"img_urls":"[', '').replace(']"}', '').replace('"', '');
                                    imagesArray.push(newString);
                                })

                                let street = response[1][0].street;
                                let budget = response[1][0].budget;
                                let housemates = response[1][0].housemates;
                                let start_date = response[1][0].start_date;
                                let type_house = response[1][0].type_house;
                                let title = response[1][0].title;
                                let id = response[1][0].id;
                                
                                const contentString =
                                    `<div class="info-window">
                                        <div class="title d-flex justify-content-between">
                                            <div class="d-flex align-items-center mt-2 mr-2">
                                                <img src="{{URL::asset('/images/icons/pin.png')}}" class="info-window-icons">
                                                <p class="search-title mb-0 ml-2">${street}</p>
                                            </div>
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="info-window-icons">
                                                <p class="search-title mb-0 ml-2">€${budget}/mnd</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2 mb-2">
                                            <div class="info-window-images">
                                                <img src="${urlString + imagesArray[0].replace('[', '')}" class="info-window-img" alt="foto van huis">
                                            </div>
                                            <div class="info-window-text ml-2">
                                                <p>${title.slice(0, 100)}...</p>
                                                <p><small>Intrekdatum: ${start_date}</small></p>
                                                <a href="/cohousings/${id}" class="info-window-cta">Meer info</a>
                                            </div>
                                        </div>
                                    </div>`


                                const infowindow = new google.maps.InfoWindow({
                                    content: contentString,
                                });

                                infowindow.open(map, marker);
                            }
                        });
                    })
                })
            }
        });
        
    });
</script>

@endsection