<a {{ $attributes }}
    class="{{ request()->fullUrlIs(url($href)) ? 'bg-indigo-600 text-slate-100' : 'text-indigo-500 hover:bg-indigo-600 hover:text-white' }}rounded-md px-3 py-2 text-sm font-medium  hover:bg-indigo-500 hover:text-white">
    {{ $slot }}
</a>
