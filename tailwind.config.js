/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/js/vue/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
        colors: {
            primary: '#111827',
            secondary: '#334155',
            highlight: '#00ADB5',
            light: '#EEEEEE',
        }
    },
  },
  plugins: [],
}
