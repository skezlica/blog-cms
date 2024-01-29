var editPosts = document.querySelectorAll('.editPost');

editPosts.forEach(function(editPost) {
    editPost.addEventListener('click', function() {
        var existingForm = editPost.closest('.post').querySelector('.edit-post-form');

        if (existingForm) {
            existingForm.remove();
            return;
        }

        var postId = editPost.getAttribute('data-post-id');
        var title = editPost.closest('.post').querySelector('.post-title').innerText;
        var content = editPost.closest('.post').querySelector('.post-content').innerText;

        var formHTML = `
            <form class="edit-post-form" method="POST" action="http://localhost/blog-cms/public/dashboard/updatePost">
                <div class="form-element">
                    <input type="hidden" name="post_id" value="${postId}">
                    <label for="title">Title:</label>
                    <input class="form-fields" type="text" name="title" id="title" value="${title}" required>
                </div>

                <div class="form-element">
                    <label for="content">Content:</label>
                    <textarea class="form-fields" name="content" id="content" cols="30" rows="10" required>${content}</textarea>
                </div>

                <div class="form-element">
                    <button type="submit">Update Post</button>
                </div>
            </form>
        `;

        var postContainer = editPost.closest('.post');
        var commentsElement = postContainer.querySelector('.comments');
        commentsElement.insertAdjacentHTML('beforebegin', formHTML);
    });
});


var editComments = document.querySelectorAll('.editComment');

editComments.forEach(function(editComment) {
    editComment.addEventListener('click', function() {
        var existingForm = editComment.closest('.comment').querySelector('.edit-comment-form');

        if (existingForm) {
            existingForm.remove();
            return;
        }

        var commentId = editComment.getAttribute('data-comment-id');
        var commentText = editComment.closest('.comment').querySelector('.comment-content').innerText;
    
        var formHTML = `
            <form class="edit-comment-form" method="POST" action="http://localhost/blog-cms/public/dashboard/updateComment">
                <div class="form-element">
                    <input type="hidden" name="comment_id" value="${commentId}">
                    <input class="form-fields" type="text" name="comment" value="${commentText}" required>
                </div>
                <div class="form-element">
                    <button type="submit">Update Comment</button>
                </div>
            </form>
        `;

        var commentContainer = editComment.closest('.comment');
        commentContainer.insertAdjacentHTML('beforeend', formHTML);
    });
});
