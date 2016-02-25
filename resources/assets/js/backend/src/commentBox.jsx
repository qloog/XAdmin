import React from 'react';

var CommentList = require('../components/commentList');
var CommentForm = require('../components/commentForm');

var data = [
    {author: "Pete Hunt", text: "This is one comment"},
    {author: "Jordan Walke", text: "This is *another* comment"}
];

var CommentBox = React.createClass({
    getInitialState() {
      return {
        data: []
      };
    },
    loadCommentsFromServer: function() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({data: data});
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    componentDidMount: function() {
        this.loadCommentsFromServer();
        setInterval(this.loadCommentsFromServer(), this.props.pollInterval);
    },

    handleCommentSubmit: function(comment) {
        var comments = this.state.data;
        var newComments = comments.concat([comment]);
        this.setState({data: newComments});
        console.log('cur1', comment);
        console.log('old2', comments);
        console.log('new3', newComments);

        $.ajax({
            url: this.props.url,
            dataType: 'json',
            type: 'POST',
            data: comment,
            success: function(data) {
                //this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    render() {
        return <div>
                <div className="commentBox">
                    <h1>comments</h1>
                    <CommentList data={this.state.data} />
                    <CommentForm onCommentSubmit={this.handleCommentSubmit}/>
                </div>
            </div>;
    }
});

ReactDOM.render(
    <CommentBox url="http://l5.ffan.com/admin/comment" />,
    document.getElementById('content')
);
