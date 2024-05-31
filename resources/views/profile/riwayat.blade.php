@extends('layouts.main')

@section('container-fluid')
    {{-- Midtrans JS --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <h1 class="text-center font-bold my-5 text-2xl">Riwayat Transaksi</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 md:px-36 lg:px-6 text-center py-3">
                        Kamar
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Pembayaran Berikutnya
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Sisa waktu
                    </th>
                    <th scope="col" class="px-24 lg:px-6 text-center py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($orders->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada transaksi</td>
                    </tr>
                @else
                    @foreach ($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="text-lg px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <img class="hidden md:block rounded-full w-16 h-16 mr-4"
                                        src="{{ asset('storage/' . $order->room->image) ?? asset('img/farhan.jpg') }}"
                                        alt="image description">
                                    <div>
                                        <p>{{ $order->room->nameroom }}</p>
                                        <p class="font-normal mt-2 text-sm text-gray-500 ">
                                            {{ \Carbon\Carbon::parse($order->start_date)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($order->end_date)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4 text-center">
                                Rp. {{ number_format($order->room->price, 0, ',', '.') }},00
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ $order->status }}
                            </td>
                            <td class="px-6 text-center py-4">
                                {{ \Carbon\Carbon::parse($order->end_date)->addDay()->format('d/m/Y') }}
                            </td>
                            <td class=" text-center text-sm ">
                                <span id="countdown-{{ $order->id }}"></span>
                            </td>
                            <td class="px-6 text-center py-4">
                                @if ($order->status == 'unpaid' && Auth::user()->is_active == false)
                                    <button type="button" onclick="snapDialog('{{ $order->snap_token }}')"
                                        class="inline-block text-white bg-hijautua hover:bg-hijaumuda focus:ring-4 focus:outline-none focus:ring-hijautua font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar
                                        Tagihan</button>
                                @else
                                    @if (Auth::user()->is_active == false)
                                        <a href="transaksi/{{ $order->room->slug }}"
                                            class="inline-block text-white bg-hijautua hover:bg-hijaumuda focus:ring-4 focus:outline-none focus:ring-hijautua font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa
                                            Lagi
                                        </a>
                                    @else
                                        <button disabled
                                            class="inline-block text-white bg-gray-500  focus:ring-4 focus:outline-none focus:ring-hijautua font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dalam
                                            tahap sewa
                                        </button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Countdown Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            @foreach ($orders as $order)
                (function() {
                    const endDate = new Date(
                        "{{ \Carbon\Carbon::parse($order->end_date)->addDay()->format('Y-m-d') }}");
                    const countdownElement = document.getElementById('countdown-{{ $order->id }}');

                    function updateCountdown() {
                        const now = new Date();
                        const timeDifference = endDate - now;

                        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                        if (days > 0) {
                            countdownElement.innerHTML = `${days} hari`;
                        } else if (hours > 0) {
                            countdownElement.innerHTML = `${hours} jam`;
                        } else if (minutes > 0) {
                            countdownElement.innerHTML = `${minutes} menit`;
                        } else {
                            countdownElement.innerHTML = `${seconds} detik`;
                        }

                        if (days <= 3) {
                            countdownElement.classList.add('bg-red-500', 'p-2', 'px-4',
                                'rounded-full', 'text-white');
                        }

                        if (timeDifference < 0) {
                            clearInterval(countdownInterval);
                            countdownElement.innerHTML = "Expired";
                            countdownElement.classList.remove('bg-red-500', 'p-2', 'px-4',
                                'rounded-full', 'text-white');
                        }
                    }

                    const countdownInterval = setInterval(updateCountdown, 1000);
                    updateCountdown();
                })();
            @endforeach
        });
    </script>


    {{-- Midtrans Script --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        function snapDialog(token) {
            window.snap.pay(token);
        }
    </script>

@endsection
