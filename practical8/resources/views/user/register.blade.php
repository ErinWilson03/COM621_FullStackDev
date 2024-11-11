<x-layout>

    <div class="header">
        <h2>Register</h2>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- name -->

            <!-- email -->

            <!-- password and password_confirmation -->
            <div class="flex gap-2 mt-2">

                <!-- password -->

                <!-- password_confirmation -->
            </div>

            <!-- submit -->
            <div class="mt-4">
                <button class="btn btn-dark" type="submit">Login</button>
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </div>

        </form>
    </div>

</x-layout>
