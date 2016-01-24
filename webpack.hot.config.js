/**
 * see:
 * http://www.infoq.com/cn/articles/react-and-webpack?utm_source=infoq&utm_medium=related_content_link&utm_campaign=relatedContent_articles_clk
 * http://segmentfault.com/a/1190000002551952#articleHeader9
 * https://github.com/sexyoung/laravel-react-webpack
 * http://www.jeremydagorn.com/posts/how_to_setup_react-hot-loader_in_your_laravel_application
 * https://christianalfoni.github.io/react-webpack-cookbook/Automatic-browser-refresh.html
 *
 * @type {{entry: string[], output: {path: string, publicPath: string, filename: string}, module: {loaders: *[]}, resolve: {extensions: string[]}, plugins: *[]}}
 */

var path = require('path');
var webpack = require('webpack');

module.exports = {
    entry: [
        "webpack-dev-server/client?http://127.0.0.1:3000",  // WebpackDevServer host and port
        "webpack/hot/only-dev-server",  // "only" prevents reload on syntax errors
        "./resources/assets/js/backend/src/user.jsx"   // Your appʼs entry point
    ],
    output: {
        path: path.join(__dirname, "/public/js/backend/build"),
        publicPath: "http://127.0.0.1:3000/static",
        filename: "bundle.js"
    },
    module: {
        loaders: [{
          test: /\.js[x]?$/,
          exclude: /node_modules/,
          loader: 'react-hot!babel-loader'
        },
        {
          test: /\.less/,
          loader: 'style-loader!css-loader!less-loader'
        }, 
        {
          test: /\.(css)$/,
          loader: 'style-loader!css-loader'
        }, 
        {
          test: /\.(png|jpg)$/,
          loader: 'url-loader?limit=8192'
        }]
      },
    resolve: {
        extensions: ['', '.js', '.jsx']
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NoErrorsPlugin()
        //new webpack.optimize.CommonsChunkPlugin('common.js'),
        //new webpack.optimize.MinChunkSizePlugin(minSize)
    ]
};
