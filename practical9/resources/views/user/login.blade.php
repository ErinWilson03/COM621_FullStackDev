<x-layout>
    <div class="header">
        <h2>Login</h2>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-2">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button class="btn btn-dark" type="submit">Login</button>
                <a href="{{ route('home') }}">Cancel</a>
            </div>

        </form>
    </div>
</x-layout>
