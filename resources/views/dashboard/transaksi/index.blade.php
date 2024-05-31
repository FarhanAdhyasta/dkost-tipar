@extends('dashboard.layouts.main')
@section('body')
    <div class="p-10">
        <!-- With actions -->
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Pengguna
        </h4>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Pengguna</th>
                            <th class="px-4 py-3">Kamar</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Masuk</th>
                            <th class="px-4 py-3">Keluar</th>
                            <th class="px-4 py-3">Aksi</th>

                        </tr>
                    </thead>
                    @foreach ($orders as $order)
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">
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
                                            <a href="/dashboard/transaksi/{{ $order->id }}">
                                                <p class="font-semibold">{{ $order->user->name }}</p>
                                            </a>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                +62 {{ $order->user->phone_number }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->room->nameroom }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    Rp.
                                    {{ number_format($order->room->price, 0, ',', '.') }},00
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight {{ $order->status === 'unpaid' ? 'text-black dark:text-white bg-gray-400 ' : 'text-green-700 bg-green-100 ' }} rounded-full">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->start_date }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->end_date }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <a href="/dashboard/transaksi/{{ $order->id }}/edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </button>
                                        <form action="/dashboard/transaksi/{{ $order->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="delete-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>



                        </tbody>
                    @endforeach
                </table>
            </div>


        </div>
    </div>
@endsection