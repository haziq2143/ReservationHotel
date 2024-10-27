import defaultTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Warna kustom
                primary: {
                    light: '#6D28D9',
                    DEFAULT: '#5B21B6',
                    dark: '#4C1D95',
                },
                secondary: {
                    light: '#EC4899',
                    DEFAULT: '#DB2777',
                    dark: '#BE185D',
                },
                neutral: {
                    light: '#E5E7EB',
                    DEFAULT: '#6B7280',
                    dark: '#374151',
                },
            },
            spacing: {
                // Penambahan custom spacing
                '128': '32rem',
                '144': '36rem',
            },
            screens: {
                '3xl': '1600px', // Breakpoint baru untuk layar besar
            },
        },
    },
    plugins: [
       
    ],
    mode: 'jit', // Just-In-Time mode, mempercepat build dan hanya menggunakan kelas yang diperlukan
    purge: {
        enabled: process.env.NODE_ENV === 'production',
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './resources/**/*.vue',
        ],
        options: {
            safelist: ['bg-green-500', 'text-center'], // Kelas yang tidak ingin dihapus
        },
    },
}
