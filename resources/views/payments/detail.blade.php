<x-app-layout>
    <h1 class="text-center text-slate-800 font-bold mb-3 mt-3 md:text-2xl text-lg">Detail Your Order</h1>

    <div class="md:w-1/2 w-full mx-auto">
        <div class="w-full flex justify-between items-center mt-8 mb-8">
            <div class="">
                <p class="text-lg font-bold ">Room:</p>
                <p class="text-sm font-normal text-gray-500">{{ $payment->reservation->room->room_number }}</p>
            </div>
            <div class="">
                <p class="text-lg font-bold ">Amount:</p>
                <p class="text-sm font-normal text-gray-500">Rp.{{ $payment->amount }}</p>
            </div>
        </div>
        <p class="text-lg font-bold">Payment Status:</p>
        @if ($payment->payment_status == 'Confirmed')
            <p class="text-green-500 text-md">{{ $payment->payment_status }}</p>
        @elseif ($payment->payment_status == 'Rejected')
            <p class="text-red-500 text-md">{{ $payment->payment_status }}</p>
        @else
            <p class="text-gray-400 text-md">{{ $payment->payment_status }}</p>
        @endif

        <p class="text-lg font-bold mt-8 ">Paid At:</p>
        @if ($payment->paid_at != null)
            <p class="text-gray-400 text-md mb-8">{{ $payment->paid_at }}</p>
        @else
            <p class="text-gray-400 text-md mb-8">Unpaid</p>
        @endif

        <p class="text-lg font-bold mt-8 ">Payment Proof:</p>
        @if ($payment->payment_proof == null)
            <form method="post" action="/payments/{{ $payment->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="file" name="payment_proof" id="payment_proof" class="mb-4 block"
                    value="{{ old('payment_proof', $payment->payment_proof) }}">
                <img id="imagePreview" src="#" alt="Image Preview" class="hidden"
                    style="max-width: 200px; margin-top: 10px;" src="{{ asset($payment->payment_proof) }}">

                <button type="submit"
                    class="mt-4 bg-indigo-500 px-4 py-2 md:px-6 md:py-2 rounded-lg text-white font-bold">Paid</button>
            </form>
        @else
            <p class="text-gray-400 text-md mb-8">Uploaded</p>
        @endif


        <div class="w-full md:flex justify-between items-center mt-8 mb-8">

            @if ($payment->code_payment_success != null)
                <p class="text-lg font-bold mt-8 ">Your Code:</p>
            @else
            @endif


            @if ($payment->code_payment_success != null)
                <p class="text-lg">
                    {!! QRCode::text($payment->code_payment_success)->svg() !!}
                </p>
            @else
            @endif

        </div>

    </div>

</x-app-layout>
