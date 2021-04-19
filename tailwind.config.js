const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue'
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      }
    },
    colors: {
      primary: '#6796ff',
      black: '#000',
      white: '#fff',
      gray: '#555'
    }
  },

  variants: {
    extend: {
      opacity: ['disabled']
    }
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
}
