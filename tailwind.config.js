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
            }),
            boxShadow: {
                'black': '5px 10px rgba(0, 0, 0, 1)'
            },
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
