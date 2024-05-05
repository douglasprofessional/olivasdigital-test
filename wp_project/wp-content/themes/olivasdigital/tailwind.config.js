/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: [
    './src/**/*.{html,js}', 
    '../../themes/olivasdigital/**/*.php'
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
      scale: {
        '03': '0.3',
      },
      spacing: {
        initial: 'initial',
        '1px': '1px',
        '2px': '2px',
        '3px': '3px',
        '4px': '4px',
        '5px': '5px',
        '10px': '10px'
      },
      letterSpacing: {
        '1px': '1px'
      },
      brightness: {
        20: '.20'
      },
      colors: {
        transparent: 'transparent',
        black: {
          100: '#000000',
          200: '#010D17'
        },
        white: '#FFFFFF',
        gray: {
          100: '#F5F8FA',
          200: '#CECECE',
          300: '#464646',
          400: '#252525'
        }
      },
      lineHeight: {
        '50px': '50px !important',
        'normal-important': 'normal !important'
      },
      height: {
        inherit: 'inherit'
      },
      minHeight: {
        '300px': '300px',
        'small': '25%',
        'medium': '50%',
        '95vh': '95vh'
      },
      maxHeight: {},
      width: {
        inherit: 'inherit'
      },
      minWidth: {},
      maxWidth: {
        initial: 'initial',
        'screen-50': '50%',
        'screen-75': '75%',
        'screen-80': '80%',
        'screen-1750': '1750px'
      },
      fontSize: {
        none: '0',
        '10px': '10px',
        '40px': '40px',
        '55px': '55px',
        '72px': '72px'
      },
      borderWidth: {
        0: '0px',
        1: '1px',
        2: '2px'
      },
      borderRadius: {
        '10px': '10px',
        '20px': '20px'
      }
    }
  },
  variants: {},
  plugins: [],
}

