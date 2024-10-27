<x-app-layout>

    <h1 class="text-center text-slate-800 font-bold mb-3 mt-3 md:text-2xl text-lg">Tambah User</h1>
    <form method="POST" action="/users" class="flex justify-center">
        @csrf
        <div class="w-1/2 h-auto p-4 max-w-full  mx-auto">
            <div class="mb-3">
                <label for="name" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Name</label>
                <input type="text" name="name"
                    class="block text-md w-full px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500">
                @error('name')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror
                <label for="email" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Email</label>
                <input type="email" name="email"
                    class="block text-md w-full px-3 py-2 mt-2 rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500">
                @error('email')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror
                <label for="password" class="font-semibold text-slate-700 text-md md:text-lg mt-4">Password</label>
                <input type="password" name="password"
                    class="block text-md w-full px-3 py-2 mt-2  rounded-md focus:ring-0 bg-indigo-200 focus:bg-slate-50 focus:border-slate-500">
                @error('password')
                    <p class="text-sm font-thin text-red-500">{{ $message }}</p>
                @enderror


            </div>
            <button type="submit"
                class="mt-8 bg-indigo-500 text-white md:px-4 md:py-3 px-3 py-2 md:text-md text-xs rounded-md p-5">Create
                User</button>
        </div>
    </form>

</x-app-layout>
