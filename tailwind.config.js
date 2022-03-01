const theme = require('./theme.json');
const tailpress = require("./vendor/sitepilot/wp-theme/resources/js/tailpress");

module.exports = {
  prefix: 'sp-',
  content: [
    "./theme.json",
    "./src/*.php",
    "./inc/*.php",
    "./resources/views/**/*.blade.php"
  ],
  theme: {
    container: {
      center: true,
      screens: {
        sm: "100%",
        md: "100%",
        lg: "1200px",
        xl: "1200px"
      }
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme('settings.color.palette', theme)
      )
    },
  },
  corePlugins: {
    preflight: false,
  },
  plugins: [
    require('@tailwindcss/line-clamp')
  ]
}
