<x-app-layout>
    <section class="bg-white py-8 antialiased ">
        <form action="/payments" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto max-w-3xl">
                <h2 class="text-xl font-semibold text-gray-900  sm:text-2xl">Order summary</h2>
                <div class="mt-6 sm:mt-8">
                    <div class="relative overflow-x-auto border-b border-gray-200 ">
                        <table class="w-full text-left font-medium text-gray-900 ">
                            <tbody class="divide-y divide-gray-200 ">
                                <tr>
                                    <td class="whitespace-nowrap py-4 md:w-[384px]">
                                        <div class=" gap-4">
                                            <p class=" block">Room No.
                                                {{ $reservation->room->room_number }}</p>

                                            <p class="text-sm text-gray-400 ">Type:
                                                {{ $reservation->room->type_room->name }}</p>

                                        </div>
                                    </td>



                                    <td class="p-4 text-right text-base font-bold text-gray-900 ">
                                        Rp.{{ $reservation->room->type_room->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 ">Order summary</h4>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 ">Original price</dt>
                                    <dd class="text-base font-medium text-gray-900 ">
                                        Rp.{{ $reservation->room->type_room->price }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 ">Booking Duration</dt>
                                    <dd class="text-base font-medium">{{ $duration }} day</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 ">Payment Method</dt>
                                    <dt>
                                        <div class="md:flex md:items-center mt-16 gap-8">
                                            <!-- Menambahkan gap di sini -->
                                            <div class="flex items-center">
                                                <input type="radio" class="w-5 h-5 cursor-pointer" id="card"
                                                    value="visa" name="payment_method" checked />
                                                <label for="card" class="ml-4 cursor-pointer">
                                                    <img src="https://readymadeui.com/images/visa.webp" class="w-3"
                                                        width="30px" alt="card1" />
                                                </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="radio" class="w-5 h-5 cursor-pointer" id="paypal"
                                                    value="paypal" name="payment_method" />
                                                <label for="paypal" class="ml-4">
                                                    <img src="https://readymadeui.com/images/paypal.webp" width="50px"
                                                        class="w-20" alt="paypalCard" />
                                                </label>
                                            </div>
                                        </div>

                                    </dt>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-lg font-bold text-gray-900 ">Total</dt>
                                <dd class="text-lg font-bold text-gray-900 ">
                                    <p>Rp.</p>
                                    <input type="text" name="amount"
                                        value="{{ $reservation->room->type_room->price * $duration }}"
                                        class="bg-white border-none text-lg font-bold text-gray-900 outline-none"
                                        readonly>
                                    <input type="number" value="{{ $reservation->id }}" name="reservation_id"
                                        class="hidden" readonly>
                                </dd>
                            </dl>

                        </div>
                        <div class="gap-4 sm:flex sm:items-center">
                            <button type="submit"
                                class="mt-4 flex w-full items-center justify-center rounded-lg bg-primary-700  px-5  text-sm font-medium text-white hover:bg-primary-800 bg-indigo-500 py-3 focus:outline-none focus:ring-4 focus:ring-primary-300  dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


</x-app-layout>
