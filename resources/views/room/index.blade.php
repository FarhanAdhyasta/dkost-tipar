@extends('layouts.main')
@props(['status'])

@section('container')
    <h1 class="text-center text-hijautua text-2xl font-bold mb-8">Pilih Kamar</h1>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 ">
        @foreach ($rooms as $room)
            <div class="lg:mb-4 relative">
                <div
                    class="inline-block w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:w-auto lg:mr-4">
                    <div class="w-full relative">

                        @if ($room->image)
                            <img class="rounded-lg lg:h-80 " src="{{ asset('storage/' . $room->image) }}"
                                alt="product image" />
                        @else
                            <img class="rounded-lg lg:h-80" src="img/farhan.jpg" alt="product image" />
                        @endif

                        <div
                            class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-1 rounded-tr-lg rounded-bl-lg">
                            <span class="text-xs">{{ $room->typeroom }}</span>
                        </div>
                    </div>
                    <div class="px-5 py-4">

                        <h5 class="text-md text-center font-semibold tracking-tight text-hijautua dark:text-white">
                            {{ $room->nameroom }}</h5>

                        <div class="flex flex-col items-center justify-center mt-2">
                            <span class="text-sm font-normal text-hijaumuda dark:text-white mb-2"> Rp.
                                {{ number_format($room->price, 0, ',', '.') }},00</span>

                            @if (
                                $room->status === 'Tersedia' &&
                                    $room->end_date == null &&
                                    $room->user_id == null &&
                                    (Auth::user() !== null ? Auth::user()->is_active == false : true))
                                <a href="/kamar/{{ $room->slug }}"
                                    class="text-white bg-hijautua mt-3 hover:bg-hijaumuda focus:ring-4 focus:outline-none focus:ring-kremmuda font-normal rounded-lg text-sm px-2 lg:px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesan
                                    Kamar</a>
                            @else
                                <button disabled
                                    class="cursor-not-allowed text-white  bg-gray-400 dark:bg-gray-600 font-normal rounded-lg text-sm px-2 lg:px-4 mt-3 py-2 text-center">Tidak
                                    bisa dipesan</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
