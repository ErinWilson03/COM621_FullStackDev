<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practical 5</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer components {

            h1 {
                @apply text-3xl font-semibold py-2;
            }

            h2 {
                @apply text-2xl font-semibold py-3;
            }

            h3 {
                @apply text-xl font-semibold py-2;
            }

            h4 {
                @apply text-lg font-semibold py-2;
            }

            a[role="button"] {
                @apply btn btn-secondary hover:no-underline;
            }

            a:not([role="button"]) {
                @apply link;
            }

            table {
                @apply w-full text-sm text-left rtl:text-right text-gray-500;
            }

            /* child selector > */
            table>thead {
                @apply text-xs text-gray-700 uppercase bg-gray-50;
            }

            table>thead>tr>th {
                @apply px-6 py-3;
            }

            table>tbody>tr {
                @apply bg-white border-b;
            }

            table>tbody>tr>td {
                @apply px-6 py-3;
            }

            /* descendant selector */
            form label {
                @apply block mb-2 text-sm font-medium uppercase text-gray-900 dark:text-white;
            }

            form input,
            textarea,
            select {
                @apply bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
            }

            form input[type=file] {
                @apply file:mr-2 file:py-2 file:px-3 file:rounded-l-md file:border-0 file:text-sm file:font-semibold hover:file:cursor-pointer hover:file:opacity-80 file:bg-gray-900 file:text-white;
            }

            button:not([role="link"]) {
                @apply btn btn-primary;
            }

            button[role="link"] {
                @apply link;
            }

            ul {
                @apply w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg;
            }

            ul>li {
                @apply w-full px-4 py-2 border-b border-gray-200 rounded-t-lg;
            }

            table {
                @apply w-full text-sm text-left text-gray-500;
            }

            thead {
                @apply text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700;
            }

            th,
            td {
                @apply px-6 py-3;
            }

            dl {
                @apply flex border-b border-slate-200 sm:py-2 md:py-3 rounded-md;
            }

            dl>dt {
                @apply font-bold text-black dark:text-white mr-5;
            }

            dl>dd {
                @apply text-slate-500 dark:text-slate-100 mr-5;
            }

            .link {
                @apply font-medium text-gray-700 hover:text-gray-900 hover:underline hover:cursor-pointer;
            }

            .nav-link {
                @apply transition-colors duration-300 font-medium text-gray-700 hover:text-blue-700 border-b-2 border-transparent hover:border-black hover:no-underline;
            }

            .btn {
                @apply focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none;
            }

            .btn-primary {
                @apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300;
            }

            .btn-secondary {
                @apply text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100;
            }

            .btn-dark {
                @apply text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300;
            }

            .btn-light {
                @apply text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100;
            }

            .btn-danger {
                @apply text-white bg-red-700 hover:bg-red-800 focus:ring-red-300;
            }

            .list-group {
                @apply w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg;
            }

            .list-item {
                @apply w-full px-4 py-2 border-b border-gray-200 rounded-t-lg;
            }

            .badge {
                @apply text-xs font-medium me-2 px-2.5 py-0.5 rounded;
            }

            .badge-blue {
                @apply bg-blue-100 text-blue-800;
            }

            .badge-pink {
                @apply bg-pink-100 text-pink-800;
            }

            .card {
                @apply p-6 bg-white border border-gray-200 rounded-lg shadow;
            }

            .header {
                @apply flex justify-between items-baseline border-b border-gray-700 pb-1 my-5;
            }

            .error {
                @apply text-sm text-red-500 mt-2;
            }

        }
    </style>
</head>

<body>
    <header>
        <!-- page navbar -->
        <nav class="flex flex-row justify-between py-3 px-6 border-b">
            <!-- site name -->
            <div class="flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <span class="text-blue-500 text-xl font-semibold">COM621</span>
            </div>

            <!-- nav links -->
            <div class="flex gap-4">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/about">About</a>
                <a class="nav-link" href="/contact">Contact</a>
                <a class="nav-link" href="/books">Books</a>
            </div>
        </nav>
    </header>

    <!-- page content area -->
    <main class="container mx-auto my-5">
        {{ $slot }}
    </main>

    <!-- page footer -->
    <footer class="py-3 px-6 border-t flex gap-2 justify-center items-center">
        <p>&copy; {{ date('Y') }} COM621 </p>

        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24"
            class="w-6 h-6">
            <path
                d="M19,3H5C3.895,3,3,3.895,3,5v14c0,1.105,0.895,2,2,2h14c1.105, 0,2-0.895,2-2V5C21,3.895,20.105,3,19,3z M9,17H6.477v-7H9 V17z M7.694,8.717c-0.771,0-1.286-0.514-1.286-1.2s0.514-1.2,1.371-1.2c0.771,0,1.286,0.514,1.286,1.2S8.551,8.717,7.694,8.717z M18,17h-2.442v-3.826c0-1.058-0.651-1.302-0.895-1.302s-1.058, 0.163-1.058, 1.302c0,0.163,0,3.826,0, 3.826h-2.523v-7h2.523v0.977 C13.93,10.407,14.581,10, 15.802,10C17.023,10,18,10.977,18,13.174V17z">
            </path>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24"
            class="w-6 h-6">
            <path
                d="M10.053,7.988l5.631,8.024h-1.497L8.566,7.988H10.053z M21,6v12 c0,1.657-1.343,3-3,3H6c-1.657,0-3-1.343-3-3V6c0-1.657, 1.343-3,3-3h12C19.657,3,21,4.343,21,6z M17.538,17l-4.186-5.99L16.774, 7 h-1.311l-2.704,3.16L10.552,7H6.702l3.941,5.633L6.906, 17h1.333l3.001-3.516L13.698,17H17.538z">
            </path>
        </svg>
    </footer>

</body>

</html>
