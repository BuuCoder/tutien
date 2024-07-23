<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(env('APP_ENV') != "local")
        <meta name="monetag" content="758854731d2f69594628704f688163b1">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-39GRKNE230"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-39GRKNE230');
        </script>
    @endif
    <title>Tu tiên giới - Majinbuu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Bebas+Neue&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
    @if (currentController() == 'HomeController')
        <link rel="stylesheet" href="{{ asset('css/swiper.bundle.min.css') }}">
    @endif
    @if (currentController() == 'AccountController')
        <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    @endif
    @if (currentController() == 'AuthController' && env('APP_ENV') != "local")
        <script>
            (function(){
                var encodedScript1 = "aHR0cHM6Ly9hbHdpbmd1bGxhLmNvbS84OC90YWcubWluLmpz";
                var decodedScript = atob(encodedScript1);
                var scriptElement = document.createElement('script');
                scriptElement.src = decodedScript;
                scriptElement.setAttribute('data-zone', '81319');
                scriptElement.async = true;
                scriptElement.setAttribute('data-cfasync', 'false');
                document.head.appendChild(scriptElement);
            })();
        </script>
    @endif
    @php /*
    <script>
        (function(){
            var encodedScript1 = "KGZ1bmN0aW9uKGQseixzKXtzLnNyYz0naHR0cHM6Ly8nK2QrJy80MDEvJyt6O3RyeXsoZG9jdW1lbnQuYm9keXx8ZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KS5hcHBlbmRDaGlsZChzKX1jYXRjaChlKXt9fSkoJ2dsb2FwaG9vLm5ldCcsNzc1NzIwMyxkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdzY3JpcHQnKSk=";
            var decodedScript = atob(encodedScript1);
            var scriptElement = document.createElement('script');
            scriptElement.innerHTML = decodedScript;
            document.head.appendChild(scriptElement);
        })();
    </script>
    <script>
        (function(){
            var encodedScript2 = "KGZ1bmN0aW9uKGQseixzKXtzLnNyYz0naHR0cHM6Ly8nK2QrJy80MDAvJyt6O3RyeXsoZG9jdW1lbnQuYm9keXx8ZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KS5hcHBlbmRDaGlsZChzKX1jYXRjaChlKXt9fSkoJ29mZmZ1cnJldG9uLmNvbScsNzc1NzE5OSxkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdzY3JpcHQnKSk=";
            var decodedScript = atob(encodedScript2);
            var scriptElement = document.createElement('script');
            scriptElement.innerHTML = decodedScript;
            document.head.appendChild(scriptElement);
        })();
    </script>
    <script>
        var encodedScript3 = 'PHNjcmlwdCBhc3luYz0iYXN5bmMiIGRhdGEtY2Zhc3luYz0iZmFsc2UiIHNyYz0iLy90aHViYW5vYS5jb20vMT96PTc3NTcyMDEiPjwvc2NyaXB0Pg==';
        var decodedScript = atob(encodedScript3);
        var scriptElement = document.createElement('div');
        scriptElement.innerHTML = decodedScript;
        document.head.appendChild(scriptElement.firstChild);
    </script>
    <script type="text/javascript">
        var encodedScript4 = 'PHNjcmlwdCB0eXBlPSd0ZXh0L2phdmFzY3JpcHQnIHNyYz0nLy9wbDIzODMzOTkxaC5oaWdocmV2ZW51ZXR3b3JrLmNvbS9iMC9lYS85Yi9iMGVhOWI2ODliZDcyMTkxYmE0MWVlNGZiNmY2ZmNkZS5qcyc+PC9zY3JpcHQ+';
        var decodedScript4 = atob(encodedScript4);
        var scriptElement = document.createElement('div');
        scriptElement.innerHTML = decodedScript4;
        document.head.appendChild(scriptElement.firstChild);
    </script>
    */ @endphp
</head>
