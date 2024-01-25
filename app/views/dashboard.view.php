<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">

<div class="add">
    <a href="<?=ROOT?>/insertPost">ADD NEW POST</a>
</div>

<?php if (!empty($data['posts'])): ?>
    <?php foreach ($data['posts'] as $post): ?> 
        <div class="post">
            <?php if ($post->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == 2): ?>
                <div class="operations">
                    <?php if ($_SESSION['user']->role_id != 2 || $post->user_id == $_SESSION['user']->id): ?>
                        <div class="operations-option">
                            <form method="POST" action="<?= ROOT ?>/dashboard/deletePost">
                                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                                <div class="form-element">
                                    <button type="submit">
                                        <img src="<?= ROOT ?>/assets/images/pencil.png" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                    <div class="operations-option">
                        <form method="POST" action="<?= ROOT ?>/dashboard/deletePost">
                            <input type="hidden" name="post_id" value="<?= $post->id ?>">
                            <div class="form-element">
                                <button type="submit">
                                    <img src="<?= ROOT ?>/assets/images/bin.png" alt="">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="user"><p><?= $post->email; ?></p></div>
            <div class="category"><p><?= $post->category_name; ?></p></div>
            
            <div class="content">
                <h2><?= $post->title; ?></h2>
                <p><?= $post->content; ?></p>
                <p class="post-datetime"><?= date('d-m-Y H:i:s', strtotime($post->created_at)) ?></p>
            </div>
            
            <div class="comments">
                <h2>Comments</h2>
                <?php if (!empty($data['comments'])): ?>
                    <?php foreach ($data['comments'] as $comment): ?>
                        <?php if ($comment->post_id == $post->id): ?>
                            <div class="comment">
                                <div class="user"><p><?= $comment->email ?></p></div>
                                <p><?= $comment->comment ?></p>
                                <div class="only-comment">
                                    <p class="comment-datetime"><?= date('d-m-Y H:i:s', strtotime($comment->created_at)) ?></p>
                                    <?php if ($comment->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == 2): ?>
                                        <div class="operationss-comments">
                                            <?php if ($_SESSION['user']->role_id != 2 || $comment->user_id == $_SESSION['user']->id): ?>
                                                    <div class="operations-option">
                                                        <form method="POST" action="<?= ROOT ?>/dashboard/deletePost">
                                                            <input type="hidden" name="post_id" value="<?= $post->id ?>">
                                                            <div class="form-element">
                                                                <div class="form-element-smaller">
                                                                    <button type="submit">
                                                                        <img src="<?= ROOT ?>/assets/images/pencil.png" alt="">
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                            <?php endif; ?>

                                            <div class="operations-option">
                                                <form method="POST" action="<?= ROOT ?>/dashboard/deleteComment">
                                                    <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                                    <div class="form-element">
                                                        <div class="form-element-smaller">
                                                            <button type="submit">
                                                                <img src="<?= ROOT ?>/assets/images/bin.png" alt="">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if(!empty($errors)):?>
                        <div class="alert">
                            <?= implode("<br>", $errors) ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-element">
                        <input type="hidden" name="post_id" value="<?= $post->id ?>">
                        <label for="comment">Comment:</label>
                        <input class="form-fields" type="text" name="comment" id="comment" required>
                    </div>

                    <div class="form-element">
                        <button type="submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

