<section class="bg-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
            <div class="px-5 py-2">
                <a href="{{ url('/') }}"
                    class="{{ Request::is('/') ? 'text-hijautua' : 'text-gray-500' }} text-base leading-6 text-gray-500 hover:text-hijautua">
                    Beranda
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ url('tentang') }}"
                    class="{{ Request::is('tentang') ? 'text-hijautua' : 'text-gray-500' }} text-base leading-6 text-gray-500 hover:text-hijautua">
                    Tentang
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ url('kamar') }}"
                    class="{{ Request::is('kamar') ? 'text-hijautua' : 'text-gray-500' }} text-base leading-6 text-gray-500 hover:text-hijautua">
                    Kamar
                </a>
            </div>
        </nav>
        <div class="flex justify-center mt-8 space-x-6">
            <p class="text-gray-500 font-bold">D'KOST Purwokerto</p>
        </div>
    </div>
</section>
