@extends('layouts.main')

@section('container')
    <h1 class="text-4xl font-bold text-hijautua text-center mb-6">Tentang Kami</h1>
    <div class="max-w-lg lg:max-w-full mx-auto">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/hero.jpg') }}" alt="D'KOST Logo"
                class="rounded-full w-64 h-64 lg:w-72 lg:h-72 my-5 object-cover">
        </div>
        <div class="lg:grid lg:grid-cols-2 gap-8">
            <div class="bg-kremmuda rounded-lg shadow-lg p-6 mb-10 lg:mb-0">
                <p class="text-md font-light leading-relaxed mb-4 text-hijaumuda">
                    <span class="text-3xl text-hijautua font-medium ">D'KOST</span> merupakan solusi utama untuk memenuhi
                    kebutuhan
                    kamar kos kamu, dengan menawarkan standar kenyamanan yang tentunya akan bikin kamu betah dikamar.
                    Nikmati pengalaman hunian
                    yang nyaman dan penuh kemudahan dengan layanan kami, semuanya bisa kamu rasakan dengan harga yang
                    pastinya
                    <span class="text-hijautua font-medium">MURAH!</span>.
                </p>
            </div>
            <div class="bg-kremmuda rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-2 text-hijautua">Informasi Kontak:</h2>
                <p class="text-md font-light mb-2 text-hijaumuda">Lokasi: Jl. Tipar Baru No. 61, Kota Purwokerto</p>
                <p class="text-md font-light mb-2 text-hijaumuda">Email: dkostpwt061@gmail.com</p>

                <p class="text-md font-light text-hijaumuda">Nomor Telepon: <a href="https://wa.me/6289670340376"
                        target="_blank" class="text-green-600 ms-1 underline">
                        +62 896-7034-0376
                    </a>
                </p>
            </div>
        </div>
        <div id="map" class="rounded-lg shadow-md mt-10" style="height: 400px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.189243874867!2d109.2396729!3d-7.4323157!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655feef846649f%3A0x29479d0dc1f3077d!2sD&#39;Kost%20Tipar!5e0!3m2!1sid!2sid!4v1716546409784!5m2!1sid!2sid"
                width=100% height=100% style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
