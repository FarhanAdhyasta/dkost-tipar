@extends('layouts.main')



@section('container')
    {{-- hero --}}


    <section id="hero"
        class="hero bg-hero bg-center bg-no-repeat bg-cover bg-gray-500 bg-blend-multiply rounded-3xl my-8 drop-shadow-xl">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                KOST <span class="text-hijaumuda">MURAH</span> PURWOKERTO
            </h1>
            <p class="mb-8 px-8 text-sm font-normal text-gray-300 md:text-lg md:px-20 lg:px-48">
                Kost kami menyediakan berbagai macam kamar kos yang nyaman dengan berbagai macam fasilitas yang membuat kamu
                betah dikamar, dan tentunya <span class="font-bold text-hijaumuda">MURAH!</span>
            </p>
            <div class="space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="/kamar"
                    class="inline-flex justify-center items-center py-2 px-4 md:py-3 md:px-5 text-sm md:text-base font-normal text-center text-kremmuda rounded-lg bg-hijautua hover:bg-hijaumuda focus:ring-4 focus:ring-kremmuda">
                    Ayo pesan
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>



    {{-- endhero --}}


    {{-- daftar kamar --}}
    {{-- <section id="kamar" class="lg:my-20">
        <p class="text-2xl mb-5 lg:my-8 text-center lg:text-3xl font-bold mt-10">Kamar kami</p>
        <div class="overflow-x-auto whitespace-nowrap lg:flex lg:flex-wrap lg:justify-center gap-4 mb-5 ">
            <div
                class="inline-block w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:w-auto lg:mr-4">
                <div class="w-full">
                    <a href="#">
                        <img class="p-3 rounded-t-lg" src="img/farhan.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5 bg-red-400">
                        <a href="#">
                            <h5 class="text-md text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kamar 01</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900 dark:text-white">$599</span>
                            <a href="#"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="inline-block w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:w-auto lg:mr-4">
                <div class="w-full">
                    <a href="#">
                        <img class="p-3 rounded-t-lg" src="img/farhan.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5 bg-red-400">
                        <a href="#">
                            <h5 class="text-md text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kamar 01</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900 dark:text-white">$599</span>
                            <a href="#"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="inline-block w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:w-auto lg:mr-4">
                <div class="w-full">
                    <a href="#">
                        <img class="p-3 rounded-t-lg" src="img/farhan.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5 bg-red-400">
                        <a href="#">
                            <h5 class="text-md text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kamar 01</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900 dark:text-white">$599</span>
                            <a href="#"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan kartu lainnya di sini -->
        </div>
    </section> --}}
    <section id="kamar" class="py-8">
        <div class="bg-kremmuda rounded-lg overflow-hidden lg:grid grid-cols-2 gap-7">
            <div class="lg:col-span-1">
                <img class="w-full lg:h-full h-64 object-cover" src="{{ asset('assets/img/K4.jpg') }}" alt="Kamar Kos" />
            </div>
            <div class="lg:col-span-1 flex flex-col justify-between">
                <div class=" p-5 lg:p-10">
                    <h2 class="text-4xl lg:text-6xl font-semibold text-hijautua">Minat dengan kamar kami?</h2>
                    <p class="text-hijaumuda  mt-2">Temukan kamar kos yang sesuai dengan isi dompet kamu.</p>
                </div>
                <div class="p-5 lg:p-10 flex lg:justify-end">
                    <a href="/kamar"
                        class="inline-block px-4 py-2 font-normal bg-hijautua hover:bg-hijaumuda focus:ring-kremmuda text-kremmuda  rounded">Lihat
                        Kamar</a>
                </div>
            </div>
        </div>
    </section>






    {{-- end daftar kamar --}}


    {{-- info --}}
    <section id="info" class="lg:my-15">

        <div class="flex flex-col lg:flex-row ">
            <div class="carousel w-full lg:w-1/2 md:mr-6 my-10">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 md:h-80 lg:h-96 overflow-hidden rounded-3xl">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/img/C1.jpg') }}"
                                class="absolute block w-full h-full object-cover rounded-3xl" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/img/C2.jpg') }}"
                                class="absolute block w-full h-full object-cover rounded-3xl" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/img/C3.jpg') }}"
                                class="absolute block w-full h-full object-cover rounded-3xl" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/img/C4.jpg') }}"
                                class="absolute block w-full h-full object-cover rounded-3xl" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/img/C5.jpg') }}"
                                class="absolute block w-full h-full object-cover rounded-3xl" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full" aria-current="true"
                            aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full" aria-current="false"
                            aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full" aria-current="false"
                            aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full" aria-current="false"
                            aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full" aria-current="false"
                            aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-3 h-3 md:w-4 md:h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-3 h-3 md:w-4 md:h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>


            {{-- Fasilitas --}}
            <div class="lg:ms-3 fasilitas w-full lg:w-1/2">
                <p class="text-2xl text-hijautua mb-10 lg:my-8 lg:text-3xl font-bold">
                    <span class="underline decoration-hijaumuda decoration-4">Fasilitas</span>
                </p>
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-6 gap-0">
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Tempat Tidur -->
                                <i class="fas fa-bed text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Tempat Tidur</h3>
                                <p class="text-md text-hijautua/70">Kamar dengan tempat tidur nyaman</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Dapur -->
                                <i class="fa-solid fa-kitchen-set text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Dapur Bersama</h3>
                                <p class="text-md text-hijautua/70">Lengkap dengan peralatan masak</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Meja Kursi -->
                                <i class="fas fa-chair text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Meja Kursi</h3>
                                <p class="text-md text-hijautua/70">Untuk melengkapi keproduktifitasan anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Lemari -->
                                <i class="fa-solid fa-jar-wheat text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Lemari</h3>
                                <p class="text-md text-hijautua/70">Lemari penyimpanan pakaian</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Kamar Mandi -->
                                <i class="fas fa-shower text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Kamar Mandi</h3>
                                <p class="text-md text-hijautua/70">Ruangan privasi untukmu membersihkan diri</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex">
                            <div class="icon h-11 w-11 rounded-lg bg-hijautua flex items-center justify-center">
                                <!-- Icon Listrik -->
                                <i class="fas fa-plug text-white"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-xl lg:text-2xl font-semibold text-hijautua">Listrik</h3>
                                <p class="text-md text-hijautua/70">Tersedia fasilitas listrik 24 jam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- end fasilitas --}}


        </div>
    </section>
    {{-- end info --}}




    {{-- Destinasi Sekitar  --}}
    <section id="destinasi" class="lg:20">
        <p class="text-2xl text-hijautua mb-5 lg:my-8 lg:text-3xl font-bold mt-10">Destinasi Terdekat</p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="relative group overflow-hidden">
                <div class="rounded-lg overflow-hidden h-32 lg:h-80">
                    <img id="image1"
                        class="h-full w-full object-cover rounded-lg transition-transform duration-300 transform scale-100"
                        src="{{ asset('assets/img/alunalun.webp') }}" alt="">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black opacity-50 rounded-b-lg transition duration-300 group-hover:opacity-0">
                    <p class="text-kremmuda text-sm font-normal lg:font-semibold text-center p-2">Alun-alun Purwokerto</p>
                </div>
                <div
                    class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300 bg-gray-800/50 rounded-lg">
                    <iframe id="map-1"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3687805947447!2d109.2275866751731!3d-7.424377192586162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e63847ad525%3A0x1094a0176a4f7eec!2sAlun%20Alun%20Kota%20Purwokerto!5e0!3m2!1sid!2sid!4v1716234881212!5m2!1sid!2sid"
                        width=100% height=100% style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="h-full w-full rounded-lg"></iframe>
                </div>
            </div>
            <div class="relative group overflow-hidden">
                <div class="rounded-lg overflow-hidden h-32 lg:h-80">
                    <img id="image2"
                        class="h-full w-full object-cover rounded-lg transition-transform duration-300 transform scale-100"
                        src="{{ asset('assets/img/rita.jpg') }}" alt="">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black opacity-50 rounded-b-lg transition duration-300 group-hover:opacity-0">
                    <p class="text-kremmuda text-sm font-normal lg:font-semibold text-center p-2">Rita Supermall</p>
                </div>
                <div
                    class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300 bg-gray-800/50 rounded-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3687805947447!2d109.2275866751731!3d-7.424377192586162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655e63652962bd%3A0x2c1b4c40662c1268!2sRITA%20SuperMall%20Purwokerto!5e0!3m2!1sid!2sid!4v1716235467018!5m2!1sid!2sid"
                        width=100% height=100% style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="relative group overflow-hidden">
                <div class="rounded-lg overflow-hidden h-32 lg:h-80">
                    <img id="image3"
                        class="h-full w-full object-cover rounded-lg transition-transform duration-300 transform scale-100"
                        src="{{ asset('assets/img/telkom.jpg') }}" alt="">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black opacity-50 rounded-b-lg transition duration-300 group-hover:opacity-0">
                    <p class="text-kremmuda text-sm font-normal lg:font-semibold text-center p-2">Telkom University</p>
                </div>
                <div
                    class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300 bg-gray-800/50 rounded-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.270756540308!2d109.24651767517331!3d-7.435263092575583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655ea49d9f9885%3A0x62be0b6159700ec9!2sInstitut%20Teknologi%20Telkom%20Purwokerto!5e0!3m2!1sid!2sid!4v1716235512000!5m2!1sid!2sid"
                        width=100% height=100% style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
