<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SupilogTimer</title>

    <!-- Fonts -->

    <!-- Styles -->

    @vite('resources/scss/app.scss')
</head>
<body id="index">
<div class="modal js-modal">
    <div class="modal-container">
        <!-- モーダル内部のコンテンツ -->
        <div class="modal-content" style="display: flex;flex-direction: row;justify-content:center">
            <a class="modal-btn" result="OK" tabindex="-1">OK</a>
            <a class="modal-btn" result="PENALTY" tabindex="-1">+2sec</a>
            <a class="modal-btn" result="DNF" tabindex="-1">DNF</a>
            <a class="modal-btn" result="CANCEL" tabindex="-1">CANCEL</a>
        </div>
    </div>
</div>
<div class="wrapper">
    <nav id="sidebar" class="sidebar" role="navigation" aria-labelledby="menuTogglerLabel" aria-hidden="true">
        <ul id="menubar" class="menu" role="menubar" aria-orientation="vertical">
            <li class="menu__item" role
            "none">
            <a class="menu__link" href="#" role="menuitem" tabindex="-1">Session</a>
            </li>
        </ul>
    </nav>
    <nav id="helpbar" class="helpbar">
        <ul id="helpmenu" class="help">
            <li>[M] : menu</li>
            <li>[D] : data</li>
            <li>[G] : graph</li>
        </ul>
    </nav>
    <main class="content">
        <div id="scramble" class="scramble" data-scramble="{{ $scramble_text }}">{{ $scramble_text }}</div>
        <div class="cube">
            <div class="surface u">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>
            </div>
            <div class="surface d">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>
            </div>
            <div class="surface b">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>
            </div>
            <div class="surface f">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>
            </div>
            <div class="surface l">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>

            </div>
            <div class="surface r">
                <div class="parent">
                    <div class="p1 part"></div>
                    <div class="p2 part"></div>
                    <div class="p3 part"></div>
                    <div class="p4 part"></div>
                    <div class="p5 part"></div>
                    <div class="p6 part"></div>
                    <div class="p7 part"></div>
                    <div class="p8 part"></div>
                    <div class="p9 part"></div>
                </div>
            </div>
        </div>
        <h1 id="timer">0.00</h1>
        <div class="result-menu"></div>
    </main>
</div>
<div class="sb-link">supilog</div>
<script src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>
@vite('resources/js/timer.js')
@vite('resources/js/menu.js')
@include('js.cube', ['scramble' => $scramble])
</body>
</html>
