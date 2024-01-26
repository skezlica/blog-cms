var editPosts = document.querySelectorAll('.editPost');

editPosts.forEach(function(editPost) {
    editPost.addEventListener('click', function() {
        var existingForm = editPost.closest('.post').querySelector('.edit-post-form');

        if (existingForm) {
            existingForm.remove();
            return;
        }

        var postId = editPost.getAttribute('data-post-id');
        console.log(postId);
    
        var formHTML = `
            <form class="edit-post-form" method="POST">
                <div class="form-element">
                    <label for="category_id">Category:</label>
                    <select class="form-fields" name="category_id" id="category_id" required>
                        <option value="0"></option>
                        <?php foreach ($data['categories'] as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-element">
                    <label for="title">Title:</label>
                    <input class="form-fields" type="text" name="title" id="title" required>
                </div>

                <div class="form-element">
                    <label for="content">Content:</label>
                    <textarea class="form-fields" name="content" cols="30" rows="10" required></textarea>
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
