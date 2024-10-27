<x-app-layout>


    <h1 class="text-center text-slate-800 font-bold mb-3 mt-3 md:text-2xl text-lg">Edit Room: {{ $room->room_number }}
    </h1>
    <form method="POST" action="/rooms/{{ $room->id }}" class="flex justify-center" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="md:w-1/2 w-full h-auto p-4 max-w-full  mx-auto">
            <div class="mb-3">
                <label for="room_number" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Room Number</label>
                <input type="text" name="room_number"
                    class="block text-md w-full px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500"
                    value="{{ old('room_number', $room->room_number) }}">
                @error('room_number')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror

                <label for="floor" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Floor</label>
                <input type="number" name="floor"
                    class="block text-md w-full px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500"
                    value="{{ old('floor', $room->floor) }}">
                @error('floor')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror

                <label for="type_room_id" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Types</label>
                <select name="type_room_id" id=""
                    class="block px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500"
                    value="{{ old('type_room_id', $room->type_room_id) }}">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_room_id')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror

                <label for="status" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Status</label>
                <select name="status" id="" value="{{ old('status', $room->status) }}"
                    class="block px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500">
                    <option value="Tersedia" class="text-green-500">Tersedia</option>
                    <option value="Booked" class="text-red-500">Booked</option>
                </select>
                @error('status')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror


                <label for="image" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Image</label>
                <input type="file" name="image" value="{{ old('image', $room->image) }}"
                    class="block text-md w-full px-3 py-2 mt-2  rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500">
                @error('image')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror


            </div>
            <button type="submit"
                class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Update
                Room</button>
        </div>
    </form>
</x-app-layout>
