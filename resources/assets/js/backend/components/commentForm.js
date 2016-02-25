'use strict';


var CommentForm = React.createClass({
    handleSubmit: function(e) {
        e.preventDefault();
        var author = this.refs.author.value.trim();
        var content = this.refs.content.value.trim();
        if (!content || !author) {
            alert('贵姓？');
            return;
        }
        // TODO: send request to the server
        this.props.onCommentSubmit({author: author, content: content});
        this.refs.author.value = '111';
        this.refs.content.value = '2222';
        return;
    },
    render: function() {
        return (
             <div className="commentForm">
                 <form className="commentForm"  onSubmit={this.handleSubmit}>
                     <input type="text" placeholder="Your name" ref="author" />
                     <input type="text" placeholder="Say something..." ref="content" />
                     <input type="submit" value="Post" />
                 </form>
             </div>
        );
    }
});

module.exports = CommentForm;
