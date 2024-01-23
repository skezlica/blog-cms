<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">

<div class="add">
    <a href="<?=ROOT?>/insertPost">ADD NEW POST</a>
</div>
<?php if (!empty($data['posts'])): ?>
    <?php foreach ($data['posts'] as $post): ?> 
        <div class="post">
            <div class="user"><p><?= $post->email; ?></p></div>
            <div class="category"><p><?= $post->category_name; ?></p></div>
            <div class="content">
                <h2><?= $post->title; ?></h2>
                <p><?= $post->content; ?></p>
            </div>
            <div class="comments">
                <h2>Comments</h2>
                <?php if (!empty($data['comments'])): ?>
                    <?php foreach ($data['comments'] as $comment): ?>
                        <?php if ($comment->post_id == $post->id): ?>
                            <div class="comment">
                                <div class="user"><p><?= $comment->email ?></p></div>
                                <p><?= $comment->comment ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <form method="POST">
                        <div class="form-element">
                            <input type="hidden" name="post_id" value="<?= $post->id ?>">
                            <label for="comment">Comment:</label>
                            <input class="form-fields" type="text" name="comment" id="comment">
                        </div>
                        <div class="form-element">
                            <button type="submit">Comment</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

