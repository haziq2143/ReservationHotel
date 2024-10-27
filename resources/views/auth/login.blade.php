<x-app-layout>
    <div class="w-full  max-w-full ">
        <div class="flex justify-center md:my-32 ">
            <div class="py-4 px-5 h-1/3 w-1/3 bg-indigo-500">
                <h1 class="text-center text-xl font-bold text-white ">Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <label for="email" class="text-white my-1">Email</label>
                    <input type="email" name="email" id="" class="px-1 py-2 block my-2 w-full">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <label for="password" class="text-white my-1">Password</label>
                    <input type="password" name="password" id="" class="px-1 py-2 block my-2 w-full">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-white">You don't have account? <a href="/users/create"
                            class="text-amber-300 hover:text-indigo-400">Create Now</a></p>
                    <button type="submit" class="bg-slate-100 px-4 py-2 rounded-md font-semibold mt-2">Login</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
