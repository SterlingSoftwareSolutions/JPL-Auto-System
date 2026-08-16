/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['-apple-system', '"Segoe UI"', 'Helvetica', 'Arial', 'sans-serif'],
      }
    },

    fill: {
        'orange': '#FFA500',
      },
  },
  plugins: [],
}

