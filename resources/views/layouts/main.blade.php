<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $name }}</title>

    {{-- flowbite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/heroicons@latest/css/heroicons.min.css">


    {{-- js --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>


    {{-- icon --}}
    <script src="https://kit.fontawesome.com/edc80a7478.js" crossorigin="anonymous"></script>





</head>

<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <div>
        @include('partials.navbar')
    </div>
    <!-- End Navbar -->

    <!-- Content Section -->
    <div class="flex-grow bg-white">

        <div class="mx-auto px-0 lg:px-11">
            @yield('container-fluid')
        </div>

        <div class="container mx-auto px-4 lg:px-11">
            @yield('container-produk')
        </div>

        <div class="container my-4 mx-auto px-11">
            @yield('container')
        </div>
    </div>
    <!-- End Content Section -->

    <!-- Footer -->
    <div>
        @include('partials.footer')
    </div>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>

</html>
