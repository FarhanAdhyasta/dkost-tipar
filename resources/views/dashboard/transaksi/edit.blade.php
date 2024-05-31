@extends('dashboard.layouts.main')

@section('body')
    <div class="p-10">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Tanggal Pemesanan
        </h4>

        <div class="max-w-md mx-auto bg-white shadow-md rounded-md overflow-hidden">
            <form action="/dashboard/transaksi/{{ $order->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Transaksi</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">ID Transaksi</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $order->id }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Pengguna</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ $order->user->profile_photo_path ? asset('storage/' . $order->user->profile_photo_path) : asset('img/farhan.jpg') }}"
                                        alt="{{ $order->user->name }}'s profile photo">
                                    <span class="ml-4">{{ $order->user->name }}</span>
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Kamar</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $order->room->nameroom }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Gambar Kamar</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <img class="w-full h-64 rounded-md object-cover"
                                    src="{{ $order->room->image ? asset('storage/' . $order->room->image) : asset('img/farhan.jpg') }}"
                                    alt="{{ $order->room->nameroom }}">
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Harga</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">Rp.
                                {{ number_format($order->room->price, 0, ',', '.') }},00</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $order->status }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="date" name="start_date" id="start_date" value="{{ $order->start_date }}"
                                    class="form-input w-full">
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Tanggal Keluar</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="date" name="end_date" id="end_date" value="{{ $order->end_date }}"
                                    class="form-input w-full">
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:px-6 text-right">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen input tanggal masuk
            const startDateInput = document.getElementById('start_date');
            // Ambil elemen input tanggal keluar
            const endDateInput = document.getElementById('end_date');

            // Tambahkan event listener untuk perubahan pada tanggal masuk
            startDateInput.addEventListener('change', function() {
                // Ambil tanggal masuk yang dipilih
                const startDate = new Date(startDateInput.value);
                // Tambahkan 31 hari ke tanggal masuk
                const endDate = new Date(startDate.setDate(startDate.getDate() + 30));
                // Ubah format tanggal menjadi YYYY-MM-DD
                const formattedEndDate = endDate.toISOString().split('T')[0];
                // Set nilai input tanggal keluar
                endDateInput.value = formattedEndDate;
            });
        });
    </script>
@endsection
