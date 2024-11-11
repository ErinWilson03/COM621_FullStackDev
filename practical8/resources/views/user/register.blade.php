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
                <input type="text" id="name" name="name" />
                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- email -->
            <div class="mt-2">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" />
                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- password and password_confirmation -->
            <div class="flex gap-2 mt-2">

                <!-- password -->
                <div class="w-1/2">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" />
                    @error('password')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- password_confirmation -->
                <div class="w-1/2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="text" id="password_confirmation" name="password_confirmation" />
                    @error('password_confirmation')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- submit -->
            <div class="mt-4">
                <button class="btn btn-dark" type="submit">Register</button>
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </div>

        </form>
    </div>

</x-layout>
