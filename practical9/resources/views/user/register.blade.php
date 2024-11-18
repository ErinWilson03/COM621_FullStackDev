<x-layout>

    <div class="header">
        <h2>Register</h2>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- name -->
            <div class="mt-2">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" />
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- email -->
            <div class="mt-2">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- passwords -->
            <div class="flex gap-2 mt-2">
                <div class="w-full">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" />
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password_confirmation') }}" />
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- submit -->
            <div class="mt-4">
                <button class="btn btn-dark" type="submit">Login</button>
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </div>

        </form>
    </div>

</x-layout>
