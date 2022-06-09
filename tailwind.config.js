module.exports = {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    'regular': '#069ab5',
                    'dark': '#078197',
                },
                'secondary': {
                    'regular': '#FFBC4D',
                    'dark': '#FB9823',
                },
                'content':{
                    'light':'#A5A5A5',
                    'regular':'#777777',
                    'dark':'#656565'
                },
                'error': '#E51F1F',
            },
            backgroundImage: {
                'texture': "url('../images/bg-bubbless.png')",
                'textures': "url('../images/bg-bubbles2.png')"
            },
            zIndex: {
                1:1,
                2:2,
                3:3,
                4:4,
            }
        },
    },
    plugins: [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer')
    ],
}
