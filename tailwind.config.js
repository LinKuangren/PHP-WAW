/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {},
    },
    colors: {
        transparent: 'transparent',
        current: 'currentColor',
        blue: '#6699CC',
        beige: '#FEEFDD',
        red: '#ED6A5A',
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
    ],
}