@extends('dashboard.layouts.main')
@section('body')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
            Selamat Datang, Admin
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full  ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Pengguna website
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        {{ $usercounts }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Total Kamar
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        {{ $roomcounts }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                        </svg>

                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Kamar terisi
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        {{ $roomfill }}
                    </p>
                </div>
                <!-- New Card for Total Price -->

            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>


                    </svg>
                </div>

                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Pemasukan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        Rp. {{ number_format($totalPrice, 0, ',', '.') }},00
                    </p>
                </div>
            </div>
        </div>
        <h1 class="font-bold text-lg my-5">TRANSAKSI TERBARU</h1>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                            <th class="px-4 py-3">Pengguna</th>
                            <th class="px-4 text-center py-3">Kamar</th>
                            <th class="px-4 text-center py-3">Harga</th>
                            <th class="px-4 text-center py-3">Status</th>
                            <th class="px-4 text-center py-3">Masuk</th>
                            <th class="px-4 text-center py-3">Keluar</th>
                            <th class="px-4 text-center py-3">Pembayaran berikutnya</th>
                            <th class="px-4 text-center py-3">Sisa waktu</th>
                        </tr>
                    </thead>
                    @foreach ($orders as $order)
                        <tbody class="bg-white divide-y  ">
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $order->user->profile_photo_path ? asset('storage/' . $order->user->profile_photo_path) : asset('img/noprofile.png') }}"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $order->user->name }}</p>
                                            <p class="text-xs text-gray-600 ">
                                                <a href="https://wa.me/62{{ $order->user->phone_number }}" target="_blank"
                                                    class="text-green-600">
                                                    +62 {{ $order->user->phone_number }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 text-center py-3 text-sm">
                                    {{ $order->room->nameroom }}
                                </td>

                                <td class="px-4 text-center py-3 text-sm">
                                    Rp.
                                    {{ number_format($order->room->price, 0, ',', '.') }},00
                                </td>
                                <td class="px-4 text-center py-3 text-xs">
                                    <span
                                        class="p-2 font-semibold leading-tight {{ $order->status === 'unpaid' ? 'text-yellow-100  bg-orange-400 ' : 'text-green-700 bg-green-100 ' }} rounded-full">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-4 text-center py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($order->start_date)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 text-center py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($order->end_date)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-center text-sm">
                                    {{ \Carbon\Carbon::parse($order->end_date)->addDay()->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-center text-sm">
                                    <span id="countdown-{{ $order->id }}"></span>
                                </td>

                            </tr>



                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="my-5 mx-4 gap-4">
                {{ $orders->links() }}
            </div>


        </div>
    </div>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('delete'))
                Swal.fire({
                    icon: 'error',
                    title: 'Deleted',
                    text: '{{ session('delete') }}',
                    timer: 2000,
                    showConfirmButton: false,
                });
            @endif
        });
    </script>
@endsection
