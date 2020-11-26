const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
                'card-image': "url('/images/alex-batchelor-q5IEr16VrTA-unsplash-2.jpg')",
                'xoxo': "url('/images/tic-tac-toe.svg')",
                'mich-stadium': "url('/images/alex-mertz-tDSmhEFfasI-unsplash-2.jpg')",
                'gradient-one' : "linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%)",
                'gradient-two' : "linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)",
                'gradient-three' : "linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%)",
            }),
            boxShadow: {
                'black': '5px 10px rgba(0, 0, 0, 1)'
            },
            width: {
                '506' : '506px',
            },
            height: {
                '1040': '1040px'
            }
        },
    },
    variants: {},
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/typography'),
    ],
};
