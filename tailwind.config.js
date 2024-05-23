/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#04A6C2',
        secondary:'#0BC0DF',
        sideBcolor: '#8A8A8A',
        grayLogin : '#F5F5F5',
        bodyColor: '#F5F5F5',
        choiceBody: '#EEFCFF'
      
     
      
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}