module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fill: {
      current: 'currentColor',
    },
    extend: {
      width: {
        '42.5': '42.5rem',
        '30': '30rem',
        '227px': '14.188rem',
        '663px': '41.438rem',
        '26px': '1.625rem',
        '15.25': '15.25rem',
        '18.5': '18.5rem',
        '46px' : '2.875rem',
      },
      spacing: {
        '0.625': '0.625rem',
        '0.938': '0.938rem',
        '6.25': '6.25rem',
        '1.875': '1.875rem',
        '1.563': '1.563rem',
        '2.875': '2.875rem',
        '3.313': '3.313rem',
        '4.125': '4.125rem',
        '3.125': '3.125rem',
        '1.25': '1.25rem',
        '14.625': '14.625rem',
        '1.375': '1.375rem',
        '7.125': '7.125rem',
      },
      maxWidth: {
        '25': '25rem',
        '18.5': '18.5rem',
        '25': '25rem',
      },
      borderWidth: {
        '1': '1px',
      },
      borderRadius: {
        '3px': '3px',
        'circle': '50%',
      },
      height: {
        '1px': '0.063rem',
        '15': '3.75rem',
        '26px': '1.625rem',
        '46px' : '2.875rem',
      },
      colors: {
        'blue': '#4066A5',
        'dark': '#131821',
        'grey': '#6A707B',
        'cream': '#E3E3E4',
        'glass': '#F2F5FA',
        'dark-blue': '#233759',
        'fb-blue': '#4267B2',
        'fb-dark-blue': '#2F4A80',
        'instagram-purple': '#C13584',
        'instagram-dark-purple': '#8F2762',
        'twitter-blue': '#1DA1F2',
        'twitter-dark-blue': '#177FBF',
        'youtube-red': '#FF0000',
        'youtube-dark-red': '#CC0000',
      },
      fontFamily: {
        arial: ['Arial'],
        georgia: ['Georgia'],
      },
      fontSize:{
        2:['2rem', '2.75rem'],
        1:['1rem', '1.75rem'],
      },
      backgroundImage: {
        'pineapple': "url('@img/background-image.png')",
        'grey-arrow': "url('@img/arrow.svg')",
        'blue-arrow': "url('@img/blue-arrow.svg')",
        'check-mark': "url(@img/checkmark.svg)",
        'fb-logo': 'url(@img/facebook-logo.svg)',
        'fb-logo-light': 'url(@img/facebook-logo-light.svg)',
      },
      boxShadow: {
        'round': '0px 20px 40px rgba(19, 24, 33, 0.3)',
        'bottom': '0px 30px 40px rgba(19, 24, 33, 0.06)',
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['active', 'hover'],
      boxShadow: ['active', 'hover'],
      scale: ['focus-within'],
      textColor: ['active'],
    },
  },
  plugins: [],
}
