<x-app-layout title="Room: {{ $room->room_number }}">
    <div class="w-full  max-w-full">
        <img src="https://picsum.photos/800/300" alt="" srcset="" class="mx-auto">
    </div>

    <div class="mt-20 w-full">
        <h1 class="text-xl font-bold text-center">Room: {{ $room->room_number }}</h1>
        @auth
            @if (auth()->user()->is_admin == true)
                <div class="w-full flex justify-end mt-10">
                    <a href="/rooms/{{ $room->room_number }}/edit"
                        class="bg-yellow-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Edit</a>
                </div>
            @endif
        @endauth
        <div class="w-full max-w-full mx-auto mt-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-indigo-500 ">

                    <thead class="text-xs text-slate-100 uppercase bg-indigo-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 border border-indigo-500">

                                Keterangan
                            </th>
                            <th scope="col" class="px-6 py-3 border border-indigo-500">

                                Isi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-indigo-200 border border-indigo-500">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                Type
                            </th>
                            <td class="px-6 py-4 border border-indigo-500">
                                {{ $room->type_room->name }}
                            </td>
                        </tr>
                        <tr class="bg-indigo-200 border border-indigo-500">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                Status
                            </th>
                            <td class="px-6 py-4 border border-indigo-500">
                                {{ $room->status }}
                            </td>
                        </tr>
                        <tr class="bg-indigo-200 border border-indigo-500">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                Capacity
                            </th>
                            <td class="px-6 py-4 border border-indigo-500">
                                {{ $room->type_room->capacity }}
                            </td>
                        </tr>
                        <tr class="bg-indigo-200 border border-indigo-500">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                Price
                            </th>
                            <td class="px-6 py-4 border border-indigo-500">
                                Rp.{{ $room->type_room->price }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    <div class="w-full flex justify-start">
        <a href="/"
            class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Back To
            Home</a>
        <a href="/reservations/{{ $room->room_number }}"
            class="mt-8 md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md  bg-green-500 text-white p-5">Booking</a>

    </div>

</x-app-layout>
