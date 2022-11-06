module.exports = {
  purge: [
    './resources/views/admin/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        gray: {
          100: '#f8fafc',
          200: '#f1f5f8',
          400: '#dae1e7',
          500: '#b8c2cc',
          600: '#8795a1',
          700: '#606f7b',
          800: '#3d4852',
          900: '#22292f'
        },
        blue: {
          100: '#eff8ff',
          200: '#bcdefa',
          400: '#6cb2eb',
          500: '#3490dc',
          600: '#2779bd',
          800: '#1c3d5a',
          900: '#12283a'
        }
      },
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
