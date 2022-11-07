<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Normalize And Styles/Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        @yield('style');
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <style>
        .marquee {
            height: calc(100vh - 95vh);
            background: black;
            color: white;
        }

        .link-container {
            display: flex;
            justify-content: space-between;
            align-content: center;
        }

        .modal {
            display: none;
        }

        .modal-back {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .25)
        }

        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            padding: 25px;
            border-radius: 5px;
            /* background-image: url({{ asset('image/wp10021529-red-pill-wallpapers.jpg') }}); */
            background: rgba(0, 0, 0, 0.931);
            background-position: center;
            width: 920px;
            color: white;
            height: 500px;
            transform: translate(-50%, -50%);
        }

        .modal-container>p {
            text-align: center;
            margin-top: 20%;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="marquee">
        <marquee behavior="scroll" direction="right" class="mx-auto" scrollamount="12">
            <span id="target"></span>
            <span id="cursor"></span>
        </marquee>
        {{-- <marquee behavior="scroll" direction="right" scrollamount="12"></marquee> --}}
    </div>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        /*** Plugin ***/
        (function($) {
            // writes the string
            //
            // @param jQuery $target
            // @param String str
            // @param Numeric cursor
            // @param Numeric delay
            // @param Function cb
            // @return void
            function typeString($target, str, cursor, delay, cb) {
                $target.html(function(_, html) {
                    return html + str[cursor];
                });
                if (cursor < str.length - 1) {
                    setTimeout(function() {
                        typeString($target, str, cursor + 1, delay, cb);
                    }, delay);
                } else {
                    cb();
                }
            }
            // clears the string
            //
            // @param jQuery $target
            // @param Numeric delay
            // @param Function cb
            // @return void
            function deleteString($target, delay, cb) {
                var length;
                $target.html(function(_, html) {
                    length = html.length;
                    return html.substr(0, length - 1);
                });
                if (length > 1) {
                    setTimeout(function() {
                        deleteString($target, delay, cb);
                    }, delay);
                } else {
                    cb();
                }
            }
            // jQuery hook
            $.fn.extend({
                teletype: function(opts) {
                    var settings = $.extend({}, $.teletype.defaults, opts);
                    return $(this).each(function() {
                        (function loop($tar, idx) {
                            // type
                            typeString($tar, settings.text[idx], 0, settings.delay, function() {
                                // delete
                                setTimeout(function() {
                                    deleteString($tar, settings.delay,
                                        function() {
                                            loop($tar, (idx + 1) % settings
                                                .text.length);
                                        });
                                }, settings.pause);
                            });
                        }($(this), 0));
                    });
                }
            });
            // plugin defaults
            $.extend({
                teletype: {
                    defaults: {
                        delay: 100,
                        pause: 5000,
                        text: []
                    }
                }
            });
        }(jQuery));
        /*** init ***/
        $('#target').teletype({
            text: [
                `Presented By OmarZR
                :)`
            ]
        });
        $('#cursor').teletype({
            text: ['|', ' '],
            delay: 0,
            pause: 500
        });
    </script>
    <script>
        document.getElementById('modal').style.display = 'block'
        window.addEventListener('scroll', function(e) {
            setTimeout(() => {
                document.getElementById('modal').style.display = 'block'
            }, 2000)
        });
        let modalAlreadyShowed = false
        window.addEventListener('scroll', function(e) {
            if (!modalAlreadyShowed) {
                setTimeout(() => {
                    document.getElementById('modal').style.display = 'block'
                }, 2000)
                modalAlreadyShowed = true
            }
        });
        document.getElementById('modal-close').addEventListener('click', function(e) {
            document.getElementById('modal').style.display = 'none'
        })
    </script>
</body>

</html>
