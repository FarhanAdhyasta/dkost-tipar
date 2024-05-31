@extends('dashboard.layouts.main')
@section('body')
    <div class="p-10">
        <form action="/dashboard/kamar/{{ $room->slug }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-5">
                <label for="kamar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kamar</label>
                <input name="kamar" type="text" id="kamar"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Nama Kamar" value="{{ $room->nameroom }}" required />
            </div>
            {{-- <div class="mb-5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input name="slug" type="text" id="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan slug" required />
            </div> --}}

            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Kamar</label>
                <div class="flex items-center mb-4">
                    <input {{ $room->status == 'Tersedia' ? 'checked' : null }} id="default-radio-1" type="radio"
                        value="Tersedia" name="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Tersedia</label>
                </div>
                <div class="flex items-center">
                    <input {{ $room->status == 'Tidak Tersedia' ? 'checked' : null }} id="default-radio-2" type="radio"
                        value="Tidak Tersedia" name="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    {{-- <input checked={{ false }} id="radio-2" type="radio" value="Tidak tersedia" name="radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> --}}
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                        tersedia</label>
                </div>
            </div>

            <div class="mb-5">
                <label for="underline_select">Tipe Kamar</label>
                <select id="underline_select" name="tipe"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option {{ $room->typeroom == 'Standar' ? 'selected' : null }} value="Standar">
                        Standar
                    </option>
                    <option {{ $room->typeroom == 'Deluxe' ? 'selected' : null }} value="Deluxe">
                        Deluxe
                    </option>
                </select>
            </div>

            <div class="mb-5">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input name="harga" type="number" id="harga"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan nominal harga" value="{{ $room->price }}" required />
            </div>
            <div class="mb-5">
                <label for="fitur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas</label>
                <input id="x" type="hidden" name="fitur" value="{{ $room->feature }}">
                <trix-editor input="x" placeholder="Masukan daftar fasilitas">{!! $room->feature !!}</trix-editor>
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Gambar
                    Kamar</label>
                <input type="hidden" name="oldImage" value="{{ $room->image }}">
                @if ($room->image)
                    <img id="imagePreview" src="{{ asset('storage/' . $room->image) }}" alt="Preview"
                        class="mb-4 w-32 h-32">
                @else
                    <img id="imagePreview" alt="Preview" class="mb-4 w-32 h-32">
                @endif
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" name="image" type="file" onchange="previewImage(event)">
            </div>

            <div>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "";
            }
        }
    </script>
@endsection
