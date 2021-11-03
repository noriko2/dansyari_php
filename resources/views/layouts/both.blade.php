<!DOCTYPE html>
<!-- ログイン中でもログインしていなくてもアクセスできるページのレイアウト。親はナシ。 -->
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8T4ECGW5YV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-8T4ECGW5YV');
    </script>

    <title>断捨離できるくん</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="/css/style.css">

</head>

<body>
    <header>
        <div class="container">
            <div class="header-items">
                <div class="site-logo">
                    <a href="/"><img src="/images/logo.png" id="logo-img" alt="断捨離できるくん"></a>
                </div>
                <div class="nav-bar">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="nav-item"><i class="fas fa-user"></i></a>
                    @else
                    <a href="{{ route('login') }}" class="nav-item">ログイン</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-item">会員登録</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <hr>

    @yield('flash')

    <main>
        @yield('content')
    </main>
    <hr class="hr-footer">

    <footer>
        <div class="container">
            <p>&copy; 断捨離できるくん</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
