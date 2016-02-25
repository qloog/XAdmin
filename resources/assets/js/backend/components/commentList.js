'use strict';

var Comment = require('../components/comment');

var CommentList = React.createClass({
 render: function() {
     var commentNodes = this.props.data.map(function(comment) {
         return (
             <Comment key={comment.id} author={comment.id}>
                 {comment.content}
             </Comment>
         );
     });

    return (
     <div className="commentList">
         {commentNodes}
     </div>
    );
 }
});

module.exports = CommentList;
