@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Password Debug Tool</h2>

        <form method="POST" action="{{ route('debug.password') }}">
            @csrf
            <div class="mb-3">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" id="user_id" class="form-control">
            </div>

            <div class="mb-3">
                <label for="test_password">Test Password:</label>
                <input type="text" name="test_password" id="test_password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Check Password</button>
        </form>

        @if (isset($results))
            <div class="mt-4">
                <h3>Results:</h3>
                <pre>{{ json_encode($results, JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif
    </div>
@endsection
