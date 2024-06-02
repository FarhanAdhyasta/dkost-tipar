@extends('layouts.main')


@section('container-fluid')
    {{-- carousel --}}
    <div>
        <img class="h-auto max-w-full w-full rounded-lg max-h-[32rem] object-cover"
            src="{{ asset('storage/' . $room->image) }}" alt="">
    </div>

    {{-- end carousel --}}
@endsection

@section('container-produk')
    <h1 class="text-lg font-bold my-5 text-center">
        {{ $room->nameroom }}
    </h1>

    <!-- Container grid menggunakan grid-cols-1 pada layar kecil dan grid-cols-2 pada layar besar -->
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10">
        <!-- Kolom 1 -->
        <div>
            <div class="mx-auto bg-white rounded-lg shadow-lg p-5 my-5">
                {{-- <h2 class="text-lg font-semibold mb-4">Spesifikasi kamar</h2>
                <p class="text-gray-700 text-sm">Kamar ini memiliki luas 4x3m dan bebas ditempati untuk 1 pria atau
                    wanita.
                </p> --}}
                <h2 class="text-lg font-semibold mb-4 mt-4">Fasilitas Kamar</h2>
                <ul class="ms-5">
                    @php
                        // Memecah string HTML menjadi array berdasarkan tag <li>
                        $features = explode('</li><li>', $room->feature);
                        // Menghapus elemen array kosong
                        $features = array_filter($features);
                    @endphp
                    @foreach ($features as $feature)
                        <li class="list-disc text-sm mb-1">{!! $feature !!}</li>
                    @endforeach
                </ul>

            </div>

            <div class="mx-auto bg-white rounded-lg shadow-lg p-5 mt-5 ">
                <h2 class="text-lg font-semibold mb-4">Peraturan Kost</h2>
                <ul class="ms-5">
                    <li class="list-disc text-sm mb-1">Wajib membawa KTP untuk pengambilan kunci</li>
                    <li class="list-disc text-sm mb-1 ">Wajib menjaga kondisi kamar</li>
                    <li class="list-disc text-sm mb-1">Dilarang membawa hewan peliharaan</li>
                    <li class="list-disc text-sm mb-1">Dilarang mencuri barang orang lain</li>
                    <li class="list-disc text-sm mb-1">Dilarang melakukan hubungan badan</li>
                    <li class="list-disc text-sm mb-1">Dilarang membuat kegaduhan</li>
                    <li class="list-disc text-sm mb-1">Dilarang menginap untuk lawan jenis di dalam kamar kecuali <span
                            class="font-bold">"PASUTRI"</span> </li>
                </ul>
                <p class="font-semibold mt-4 text-sm text-red-600">*Jika penghuni melanggar peraturan, bapak kos berhak
                    memberikan
                    sanksi
                    dikeluarkan
                    / tidak diterima
                    di
                    kos!
                </p>
            </div>

        </div>

        <!-- Kolom 2 -->
        <div>
            <div class="mx-auto bg-white rounded-lg shadow-lg p-5 my-5">
                <h2 class="text-lg font-semibold mb-4">Minat dengan Kamar ini?</h2>
                <p class="text-gray-700 text-sm">*aturan penyewaan dihitung dan dibayar setiap 1 bulan</p>

                {{-- end date --}}
                <a href="/transaksi/{{ $room->slug }}"
                    class="mt-4 inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa
                    sekarang!</a>
            </div>
        </div>
    </div>
@endsection
