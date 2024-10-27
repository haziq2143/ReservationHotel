<x-app-layout>
    <div class="w-full">
        <h1 class="text-indigo-500 font-bold text-xl md:text-3xl text-center">Rooms</h1>
        <div class="flex justify-end ">
            <a href="/rooms/create"
                class="mt-8 me-2 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Add
                New
                Room</a>
            <a href="/types/create"
                class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Add New
                Type Room</a>
        </div>
    </div>
    <div class="md:flex flex-wrap md:justify-center w-full">
        @foreach ($rooms as $room)
            <div class="mt-20 md:w-1/2 w-full p-3">
                <div class="flex w-full">
                    <div class="image w-1/2">
                        <img src="https://picsum.photos/300/300" alt="" width="200" height="200"
                            class="rounded-md">
                    </div>
                    <div class="text ms-3 w-1/2">
                        <h2 class="text-lg font-bold">{{ $room->room_number }}</h2>
                        <h3 class="text-md ">Type: {{ $room->type_room->name }}</h3>
                        <p class="text-sm text-slate-400">{{ $room->type_room->description }}</p>
                        @if ($room->status == 'Tersedia')
                            <p class="text-xs text-green-500">{{ $room->status }}</p>
                        @else
                            <p class="text-xs text-red-500">{{ $room->status }}</p>
                        @endif
                        <h3 class="flex text-sm justify-end">Harga:</h3>
                        <h2 class="flex text-lg justify-end items-end mb-5">Rp.{{ $room->type_room->price }}</h2>

                        @if ($room->status == 'Tersedia')
                            <a href="/rooms/{{ $room->room_number }}"
                                class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md mx-end">Lihat
                                Detail</a>
                        @else
                            <a href="/"
                                class="mt-8 bg-slate-300 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md mx-end">Lihat
                                Detail</a>
                        @endif
                        <a href="/rooms/{{ $room->room_number }}/edit"
                            class="mt-8 bg-yellow-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md mx-end">Update
                            Room</a>


                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
