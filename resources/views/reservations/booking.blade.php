<x-app-layout>
    <!-- component -->
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <form action="/reservations" method="POST">
                @csrf
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="room_number" class="mb-3 block text-base font-medium text-[#07074D]">
                                Room
                            </label>
                            <input type="text" name="room_number" id="room_number" value="{{ $room->room_number }}"
                                readonly
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-400 outline-none focus:border-indigo-500 focus:shadow-md" />
                        </div>
                    </div>

                </div>


                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="check_in" class="mb-3 block text-base font-medium text-[#07074D]">
                                Check-In
                            </label>
                            <input type="date" name="check_in" id="check_in"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                        </div>
                    </div>

                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="check_out" class="mb-3 block text-base font-medium text-[#07074D]">
                                Check-Out
                            </label>
                            <input type="date" name="check_out" id="check_out"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-indigo-500 focus:shadow-md" />
                        </div>
                    </div>

                </div>
                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-indigo-500 py-2 px-4 text-center text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
