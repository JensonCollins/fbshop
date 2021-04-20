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
      secondary: '#547bd2',
      black: '#000',
      white: '#fff',
      gray: {
        100: '#F9FAFB',
        200: '#E5E7EB',
        300: '#D1D5DB',
        400: '#9CA3AF',
        500: '#6B7280',
        600: '#4B5563',
        700: '#374151',
        800: '#1F2937',
        900: '#111827'
      },
      red: {
        700: '#B91C1C'
      },
      indigo: {
        500: '#6366F1'
      }
    }
  },

  variants: {
    extend: {
      opacity: ['disabled']
    }
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
}
