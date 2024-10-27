<x-app-layout title="Haloo">
    <div class="w-full md:h-80 h-60 bg-gradient-to-r from-indigo-500 to-fuchsia-500">
        <div class="md:mx-20 md:pt-20 mx-10 pt-10">
            <h3 class="text-lg md:text-xl font-medium text-white ">Welcome to Website</h3>
            <h3 class="text-xl md:text-4xl font-bold text-white">Five Hotel</h3>
            <h1 class="md:mt-2 md:text-4xl text-2xl text-white font-bold ">Temukan Kamar yang pas untuk anda</h1>
            <h3 class="md:mt-1 mdtext-xl text-lg text-white font-bold ">Ciptakan suasana yang pas</h3>
            <button class="text-indigo-500 bg-white font-bold py-2 px-4 mt-3 rounded-xl ">Get Started</button>
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
                        <h2 class="flex text-lg justify-end items-end">Rp.{{ $room->type_room->price }}</h2>

                        @if ($room->status == 'Tersedia')
                            <a href="/rooms/{{ $room->room_number }}"
                                class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md mx-end">Lihat
                                Detail</a>
                        @else
                            <a href="/"
                                class="mt-8 bg-slate-300 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md mx-end">Lihat
                                Detail</a>
                        @endif


                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
