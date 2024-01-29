<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css">
<script src="<?=ROOT?>/assets/js/dashboard.js" defer></script>
 
<div class="navbar">
    <div class="profile">
        <img src="<?= ROOT ?>/assets/images/profile.png" alt="">
        <p><?= $_SESSION['user']->email; ?></p>
    </div>
    
    <ul>
        <li><a href="<?=ROOT?>/home">Home</a></li>
        <?php if ($_SESSION['user']->role_id == 2): ?>
            <li><a href="<?=ROOT?>/manageUsers">Manage Users</a></li>
        <?php endif; ?>
        <li><a href="<?=ROOT?>/signout">Sign Out</a></li>
    </ul>
</div>

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
                            <div class="form-element">
                                <button class="editPost" type="button" data-post-id="<?= $post->id ?>">
                                    <img src="<?= ROOT ?>/assets/images/pencil.png" alt="">
                                </button>
                            </div>
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
                        
            <div class="user"><h3><?= $post->email; ?></h3></div>
            <div class="category"><h4><?= $post->category_name; ?></h4></div>
            
            <div class="content">
                <h2 class="post-title"><?= $post->title; ?></h2>
                <p class="post-content"><?= $post->content; ?></p>
                <p class="post-datetime"><?= date('d-m-Y H:i:s', strtotime($post->created_at)) ?></p>
            </div>
            
            <div class="comments">
                <h2>Comments</h2>
                <?php if (!empty($data['comments'])): ?>
                    <?php foreach ($data['comments'] as $comment): ?>
                        <?php if ($comment->post_id == $post->id): ?>
                            <div class="comment">
                                <div class="user"><h3><?= $comment->email ?></h3></div>
                                <p class="comment-content"><?= $comment->comment ?></p>
                                <div class="only-comment">
                                    <p class="comment-datetime"><?= date('d-m-Y H:i:s', strtotime($comment->created_at)) ?></p>
                                    <?php if ($comment->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == 2): ?>
                                        <div class="operationss-comments">
                                            <?php if ($_SESSION['user']->role_id != 2 || $comment->user_id == $_SESSION['user']->id): ?>
                                                    <div class="operations-option">
                                                        <div class="form-element">
                                                            <div class="form-element-smaller">
                                                                <button class="editComment" type="button" data-comment-id="<?= $comment->id ?>">
                                                                    <img src="<?= ROOT ?>/assets/images/pencil.png" alt="">
                                                                </button>
                                                            </div>
                                                        </div>
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

