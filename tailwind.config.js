import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
               sans : ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
              // 'tint-primary': '#fcd891' 
              // 'tint-primary': '#F0EADF' 
              'tint-primary':'LavenderBlush'

            },
            keyframes: {
              grow:{
"0%": {
  height: "0%"
},
"100%": {
  height: "100%"
}

              },
                typing: {
                  "0%": {
                    width: "0%",
                    visibility: "hidden"
                  },
                  "100%": {
                    width: "100%"
                  }  
                },
                slideRight: {
                  '0%': {
                    transform: 'translateX(-100%)',
                    opacity: '0',
                },
                '100%': {
                    transform: 'translateX(0)',
                    opacity: '1',
                },
                },
                slideLeft: {
                  '0%': {
                    transform: 'translateX(100%)',
                    opacity: '0',
                },
                '100%': {
                    transform: 'translateX(0)',
                    opacity: '1',
                },
                },
                blink: {
                  "50%": {
                    borderColor: "transparent"
                  },
                  "100%": {
                    borderColor: "white"
                  }  
                }
              },
              animation: {
                typing: "typing 3s steps(23) infinite alternate, blink 1s infinite",
                slideRight: "slideRight 2s",
                slideLeft: "slideLeft 2s",
                grow: "grow 10s"
              }
            
        },
    },

    plugins: [forms],
};
