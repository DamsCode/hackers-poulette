const path = require('path');

module.exports = {
    mode: 'development',
    watch: true,
    entry: './assets/src/js/main.js',
    output: {
        filename: 'main.js',
        path: path.resolve('./assets/', 'js'),
    },
};