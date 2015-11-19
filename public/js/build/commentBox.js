(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var Comment = React.createClass({
  displayName: "Comment",

  render: function render() {
    return React.createElement(
      "div",
      { className: "comment" },
      React.createElement(
        "h2",
        { className: "commentAuthor" },
        this.props.author
      ),
      this.props.children
    );
  }
});

module.exports = Comment;

},{}],2:[function(require,module,exports){
'use strict';

var CommentForm = React.createClass({
    displayName: 'CommentForm',

    handleSubmit: function handleSubmit(e) {
        e.preventDefault();
        var author = this.refs.author.value.trim();
        var content = this.refs.content.value.trim();
        if (!content || !author) {
            alert('贵姓？');
            return;
        }
        // TODO: send request to the server
        this.props.onCommentSubmit({ author: author, content: content });
        this.refs.author.value = '111';
        this.refs.content.value = '2222';
        return;
    },
    render: function render() {
        return React.createElement(
            'div',
            { className: 'commentForm' },
            React.createElement(
                'form',
                { className: 'commentForm', onSubmit: this.handleSubmit },
                React.createElement('input', { type: 'text', placeholder: 'Your name', ref: 'author' }),
                React.createElement('input', { type: 'text', placeholder: 'Say something...', ref: 'content' }),
                React.createElement('input', { type: 'submit', value: 'Post' })
            )
        );
    }
});

module.exports = CommentForm;

},{}],3:[function(require,module,exports){
'use strict';

var Comment = require('../components/comment');

var CommentList = React.createClass({
    displayName: 'CommentList',

    render: function render() {
        var commentNodes = this.props.data.map(function (comment) {
            return React.createElement(
                Comment,
                { key: comment.id, author: comment.id },
                comment.content
            );
        });

        return React.createElement(
            'div',
            { className: 'commentList' },
            commentNodes
        );
    }
});

module.exports = CommentList;

},{"../components/comment":1}],4:[function(require,module,exports){
'use strict';

var CommentList = require('../components/commentList');
var CommentForm = require('../components/commentForm');

var data = [{ author: "Pete Hunt", text: "This is one comment" }, { author: "Jordan Walke", text: "This is *another* comment" }];

var CommentBox = React.createClass({
    displayName: 'CommentBox',

    getInitialState: function getInitialState() {
        return {
            data: []
        };
    },
    loadCommentsFromServer: function loadCommentsFromServer() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: (function (data) {
                this.setState({ data: data });
            }).bind(this),
            error: (function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }).bind(this)
        });
    },

    componentDidMount: function componentDidMount() {
        this.loadCommentsFromServer();
        setInterval(this.loadCommentsFromServer(), this.props.pollInterval);
    },

    handleCommentSubmit: function handleCommentSubmit(comment) {
        var comments = this.state.data;
        var newComments = comments.concat([comment]);
        this.setState({ data: newComments });
        console.log('cur1', comment);
        console.log('old2', comments);
        console.log('new3', newComments);

        $.ajax({
            url: this.props.url,
            dataType: 'json',
            type: 'POST',
            data: comment,
            success: (function (data) {
                //this.setState({data: data});
            }).bind(this),
            error: (function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }).bind(this)
        });
    },

    render: function render() {
        return React.createElement(
            'div',
            { className: 'commentBox' },
            React.createElement(
                'h1',
                null,
                'comments'
            ),
            React.createElement(CommentList, { data: this.state.data }),
            React.createElement(CommentForm, { onCommentSubmit: this.handleCommentSubmit })
        );
    }
});

ReactDOM.render(React.createElement(CommentBox, { url: 'http://l5.ffan.com/admin/comment' }), document.getElementById('example'));

},{"../components/commentForm":2,"../components/commentList":3}]},{},[4]);
