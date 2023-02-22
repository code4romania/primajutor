/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php",],
  theme: {
    fontFamily: {
      sans: ['Titillium Web', 'Roboto',  'sans-serif']
    },
  
   
    extend: { 
       colors: {
      transparent: 'transparent',
      black: '#000',
      white: '#fff',
     'main-color': '#e52a3f', // red
     'secondary-color': '#54617a',
     'accent-gray': '#e7ebed',
     'bg-gray': '#F2F2F2', //  in header
     'main-gray': '#828c9e',
     'text-gray': '#828282',
     'yellow': '#FFEB4F', // in footer
     'success-color': '#7BCF95', //btn in header
    },
    lineHeight: {
      '12': '3rem',
      '14': '3.5rem',
    }
  },
  },
  plugins: [],
}




/** use dash (-) for css classes, not underline (_)
 *  for object's property - apply string ('custom-style')
 */
