/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js}',
  "./node_modules/flowbite/**/*.js",
  'node_modules/preline/dist/*.js',
],

  theme: {
    extend: {
      fontFamily : {
        'popin' : ['"Poppins']
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('preline/plugin'),
    require("daisyui"),
    require("rippleui")
  ],
}

