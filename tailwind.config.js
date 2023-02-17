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
     'main-color': '#e52a3f',
     'secondary-color': '#54617a',
     'accent-gray': '#e7ebed',
     'bg-gray': '#F2F2F2',
     'main-gray': '#828c9e',
     'text-gray': '#828282',
     'success-color': '#7BCF95',
    },},
  },
  plugins: [],
}




/** use dash (-) for css classes, not underline (_)
 *  for object's property - apply string ('custom-style')
 */
