<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Surat</title>
</head>
<body>

    <header>
        <h2>Sistem Informasi Surat</h2>

        <nav>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                |
                <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
                |
                <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>

                <br><br>

                <span>
                    Login sebagai:
                    <strong>{{ Auth::user()->name }}</strong>
                    ({{ Auth::user()->role }})
                </span>

                <form action="{{ route('logout') }}"
                      method="POST"
                      style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>

            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>

    <hr>

    <footer>
        <p>Sistem Informasi Surat</p>
    </footer>

</body>
</html>