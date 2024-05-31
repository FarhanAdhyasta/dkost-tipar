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
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">email</th>
                            <th class="px-4 py-3">Role</th>


                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('img/noprofile.png') }}"
                                                alt="{{ $user->name }}'s profile photo" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/dashboard/pengguna/{{ $user->id }}"
                                                class="font-semibold">{{ $user->name }}</a>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->email }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <p>{{ $user->usertype }}</p>
                                </td>


                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">

                                        <form action="/dashboard/pengguna/{{ $user->id }}" method="POST"
                                            id="delete-form-{{ $user->id }}">
                                            @method('delete')
                                            @csrf
                                            <button type="button"
                                                class="delete-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete" data-user-name="{{ $user->name }}"
                                                data-user-id="{{ $user->id }}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const userName = this.getAttribute('data-user-name');
                    const userId = this.getAttribute('data-user-id');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: `Anda akan menghapus pengguna '${userName}'`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${userId}`).submit();
                        }
                    });
                });
            });

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
