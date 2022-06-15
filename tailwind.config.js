module.exports = {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        fontFamily: {
            'lato-regular': ['Lato Regular'],
            'lato-bold': ['Lato Bold'],
            'lato-black': ['Lato Black'],
            'raleway-medium': ['Raleway Med'],
            'raleway-semi': ['Raleway Semi'],
            'raleway-bold': ['Raleway Bold'],
            'raleway-black': ['Raleway Black'],
        },
        screens: {
            'xs': '320px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
        extend: {
            colors: {
                'primary': {
                    'regular': '#FFD786',
                    'light': '#FFE8B9',
                    'dark': '#FFC360',
                },
                'content': {
                    'regular': '#6E6E6E',
                    'light': '#707070',
                },
                'error': '#E51F1F',
            },
            backgroundImage: {
                'texture': "url('../images/bg-texture.svg')",
                'wave': "url('../images/wave.svg')",
            },
            zIndex: {
                1: 1,
                2: 2,
                3: 3,
                4: 4,
                5: 5,
            },
            width:{
                'thumbnail':'120px'
            },
            height:{
                'thumbnail':'220px'
            },
            minHeight:{
                '90vh': '90vh',
            }
        },
    },
    plugins: [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
        require('@tailwindcss/line-clamp'),
    ],
}
