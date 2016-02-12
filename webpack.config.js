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
        app:    "./resources/assets/js/backend/src/app.jsx",
        login:  "./resources/assets/js/backend/src/login.jsx",
        dashboard:  "./resources/assets/js/backend/src/dashboard.jsx",
        user:  "./resources/assets/js/backend/src/user.jsx",
        role:  "./resources/assets/js/backend/src/role.jsx",
        permission:  "./resources/assets/js/backend/src/permission.jsx"
    },
    output: {
        path: path.join(__dirname, "/public/js/backend/build"),
        filename: "[name].js"
    },
    module: {
        loaders: [{
          test: /\.jsx$/,
          exclude: /node_modules/,
          loader: 'babel-loader'
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
        'react-dom': 'ReactDOM',
        //'antd': 'Antd'
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NoErrorsPlugin()
        //new webpack.optimize.CommonsChunkPlugin('common.js'),
        //new webpack.optimize.MinChunkSizePlugin(minSize)
    ]
};
