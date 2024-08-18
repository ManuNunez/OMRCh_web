/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/view/resources/components/*.php',
    './src/view/resources/*.php',
  ],
  theme: {
    screens: {
      'sm': '300px',
      // => @media (min-width: 300px) { ... }

      'md': '650px',
      // => @media (min-width: 650px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    }
  },
  plugins: [],
}
