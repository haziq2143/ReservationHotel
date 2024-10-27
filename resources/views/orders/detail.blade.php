<x-app-layout>
    <div class="md:w-1/2 w-full mx-auto">
        <div class="w-full flex justify-between items-center mt-8 mb-8">
            <div class="">
                <p class="text-lg font-bold ">Room:</p>
                <p class="text-sm font-normal text-gray-500">{{ $order->reservation->room->room_number }}</p>
            </div>
            <div class="">
                <p class="text-lg font-bold ">Amount:</p>
                <p class="text-sm font-normal text-gray-500">Rp.{{ $order->amount }}</p>
            </div>
        </div>
        <p class="text-lg font-bold">Payment Status:</p>
        @if ($order->payment_status == 'Paid')
            <p class="text-green-500 text-md">{{ $order->payment_status }}</p>
        @else
            <p class="text-gray-400 text-md">{{ $order->payment_status }}</p>
        @endif

        <p class="text-lg font-bold mt-8 ">Paid At:</p>
        @if ($order->paid_at != null)
            <p class="text-gray-400 text-md mb-8">{{ $order->paid_at }}</p>
        @else
            <p class="text-gray-400 text-md mb-8">Unpaid</p>
        @endif
        <img alt="{{ asset($order->payment_proof) }}" style="max-width: 200px; margin-top: 10px;"
            src="{{ asset($order->payment_proof) }}">
        <form method="post" action="/orders/{{ $order->id }}">
            @csrf
            @method('PUT')
            <button type="submit" value="Confirmed" name="payment_status"
                class="mt-4 bg-green-500 px-4 py-2 md:px-6 md:py-2 rounded-lg text-white font-bold">Confirmed</button>
            <button type="submit" value="Rejected" name="payment_status"
                class="mt-4 bg-red-500 px-4 py-2 md:px-6 md:py-2 rounded-lg text-white font-bold">Rejected</button>
        </form>
    </div>
</x-app-layout>
