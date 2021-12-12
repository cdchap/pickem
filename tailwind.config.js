module.exports = {
  content: ["./src/**/*.{blade.php,js}"],
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
],
  theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var'],
            },
            backgroundImage: theme => ({
                
                'card-image': "url('/images/51710934036_4a5612c2fd_k.jpg')",
                'xoxo': "url('/images/tic-tac-toe.svg')",
                'mich-stadium': "url('/images/51710934036_4a5612c2fd_k.jpg')",
                'gradient-one' : "linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%)",
                'gradient-two' : "linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)",
                'gradient-three' : "linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%)",
                'gradient-four' : "linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)"
            }),
            boxShadow: {
                'black': '5px 10px rgba(0, 0, 0, 1)'
            },
            width: {
                'skeleton-table' : '592px',
            },
            height: {
                'skeleton-table': '1040px'
            }
        },
    },
  plugins: [
        // require('@tailwindcss/ui'),
        // require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('tailwindcss/colors')
  ],
}
