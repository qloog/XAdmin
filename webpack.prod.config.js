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
    entry: {
        app: path.resolve(__dirname, '/public/js/backend/dist/main.js'),
        vendors: ['react']
    },
    output: {
        path: path.join(__dirname, "/public/js/backend/dist"),
        publicPath: "http://127.0.0.1:3000/static/",
        filename: "bundle.js"
    },
    module: {
        loaders: [{
          test: /\.jsx$/,
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
    externals: {
        'react': 'React',
        'react-dom': 'ReactDOM'
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin('vendors', 'common.js'),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
        //new webpack.optimize.MinChunkSizePlugin(minSize)
    ]
};
