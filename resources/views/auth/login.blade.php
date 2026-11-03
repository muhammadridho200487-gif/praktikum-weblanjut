@extends('layouts.app')

@section('content')
    <h1>Login Sistem Informasi Surat</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <p style="color: red;">
            {{ $errors->first() }}
        </p>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div>
            <label>Email</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input
                type="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">Login</button>
    </form>
@endsection