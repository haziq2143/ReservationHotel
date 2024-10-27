{{--  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" --> --}}

<a {{ $attributes }}
    class="{{ request()->fullUrlIs(url($href)) ? 'bg-indigo-600 text-slate-100' : 'text-indigo-500 hover:bg-indigo-600 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium text-indigo-500 hover:bg-indigo-700 hover:text-white">{{ $slot }}</a>
