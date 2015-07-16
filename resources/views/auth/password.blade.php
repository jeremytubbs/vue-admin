@extends('app')

@section('content')
<main class="container">
    @include("partials.errors")
    <form method="POST" action="/password/forgot">
        {!! csrf_field() !!}

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <button type="submit">
                Send Password Reset Link
            </button>
        </div>
    </form>
</main>
@endsection