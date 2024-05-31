@extends('layouts.main')

@section('container')
    <div class="grid grid-cols-1 gap-4 ">

        @php
            $user = Auth::user();
        @endphp

        <div class="text-center"> <!-- Tambah class text-center di div ini -->
            <h1 class="text-2xl font-bold mb-3">{{ $room->nameroom }}</h1>
            <img class="mx-auto rounded-lg w-96" src="{{ asset('storage/' . $room->image) }}" alt="Farhan's Photo">
            <!-- Tambahkan class mx-auto di sini -->
        </div>
        <h1 class="text-2xl font-bold mt-10">Data Pemilik</h1>
        <div class="bg-white rounded-lg p-4 shadow-md ">
            <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
            <p class="text-gray-600 text-sm">Pemilik kamar ini</p>
            <p class="text-gray-600 text-sm">No Hp: +62 {{ $user->phone_number }}</p>
            <p class="text-gray-600 text-sm">Email: {{ $user->email }}</p>
            <p class="text-gray-600 text-sm">Alamat: {{ $user->address }}</p>
        </div>

        <h1 class="text-2xl font-bold">Pilih Tanggal</h1>
        <div class="bg-white rounded-lg p-4 shadow-md ">

            {{-- datepicker --}}
            <div class="relative max-w-sm mt-3">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input id="input-date" name="range" type="date" onchange="setDate()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
                {{-- <input datepicker name="range" type="text" onchange="setDate()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date"> --}}
            </div>

        </div>

        <h1 class="text-2xl font-bold">Detail Pembayaran</h1>
        <div class="bg-white rounded-lg p-4 shadow-md ">

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Harga
                            </th>
                            <td class="px-3 py-4">
                                : Rp.
                                {{ number_format($room->price, 0, ',', '.') }},00
                            </td>

                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Tanggal Sewa
                            </th>
                            <td class="px-3 py-4" id="rental-date">
                                : <span id="start-date">-</span> - <span id="end-date">-</span>
                            </td>

                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Total Pembayaran
                            </th>
                            <td class="px-3 py-4">
                                : Rp. <span id="total-price">{{ number_format($room->price, 0, ',', '.') }},00</span>

                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="mt-4">
            <button type="button" onclick="order()"
                class="text-white bg-hijautua mt-3 hover:bg-hijaumuda focus:ring-4 focus:outline-none focus:ring-kremmuda font-normal rounded-lg text-sm px-2 lg:px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesan
                Kamar</button>

            <button id="pay-button" hidden>checkout</button>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        var room = '<?php echo $room; ?>'
        var token = "{{ csrf_token() }}"

        let start_date = null;
        let end_date = null;

        function order() {
            $.ajax({
                url: '/order',
                type: 'POST', // Metode permintaan
                data: {
                    _token: token,
                    room: room,
                    start_date: start_date,
                    end_date: end_date
                }, // Mengambil data formulir
                success: function(response) {
                    // Tanggapan sukses dari server
                    window.snap.pay(response.token);
                    // Lakukan tindakan tambahan jika diperlukan
                },
                error: function(xhr, status, error) {
                    // Tanggapan kesalahan dari server
                    console.error(error);
                    // Tindakan alternatif jika diperlukan
                }
            });
        }

        function formateDate(date) {
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2); // Tambah 1 karena bulan dimulai dari 0
            var year = date.getFullYear().toString(); // Mengambil 2 digit terakhir dari tahun

            // Format tanggal menjadi dd/mm/yy
            var formattedDate = day + "/" + month + "/" + year;
            return formattedDate;
        }

        function setDate() {
            let input = document.querySelector("#input-date").value;
            let start = new Date(input);
            var end = new Date(start);
            end.setMonth(end.getMonth() + 1); // Menambah 1 bulan

            var rentalStartDate = formateDate(start);
            var rentalEndDate = formateDate(end);
            start_date = rentalStartDate;
            end_date = rentalEndDate;
            document.getElementById("start-date").textContent = rentalStartDate;
            document.getElementById("end-date").textContent = rentalEndDate;
        }
    </script>
@endsection
