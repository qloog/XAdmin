'use strict';

var Comment = React.createClass({
 render: function() {
   return (
     <div className="comment">
        <h2 className="commentAuthor">
            {this.props.author}
        </h2>
         {this.props.children}
     </div>
   );
 }
});

module.exports = Comment;
