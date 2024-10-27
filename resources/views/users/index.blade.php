<x-app-layout>
    <div class="mt-20 w-full">
        <h1 class="text-xl font-bold text-center">Users Management</h1>
        <div class="w-full max-w-full mx-auto mt-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-indigo-500 ">

                    <thead class="text-xs text-slate-100 uppercase bg-indigo-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 border border-indigo-500">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 border border-indigo-500">
                                Created Account Since
                            </th>
                            <th scope="col" class="px-6 py-3 border border-indigo-500">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->is_admin == false)
                                <tr class="bg-indigo-200 border border-indigo-500">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                        {{ $user->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                        {{ $user->created_at->format('d, M Y') }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-indigo-500">
                                        <form method="post" action="users/{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </th>

                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>

    </div>
</x-app-layout>
