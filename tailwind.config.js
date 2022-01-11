module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'lightBrown': '#F4E3DB',
                brown: {
                    50: '#fdf8f6',
                    100: '#f2e8e5',
                    200: '#eaddd7',
                    300: '#e0cec7',
                    400: '#d2bab0',
                    500: '#bfa094',
                    600: '#a18072',
                    700: '#977669',
                    800: '#846358',
                    900: '#43302b',
                },
            }
        },
    },
    variants: {
        extend: {
            cursor: ['disabled'],
            pointerEvents: ['disabled'],
            backgroundColor: ['disabled'],
            textColor: ['disabled'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
