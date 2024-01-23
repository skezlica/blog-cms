<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">

<div class="add">
    <a href="<?=ROOT?>/insertPost">ADD NEW POST</a>
</div>
<?php if(!empty($data['posts'])): ?>
   <?php foreach ($data['posts'] as $post): ?> 
    <div class="post">
        <div class="user"><p><?php echo $post->email; ?></p></div>
        <div class="category"><p><?php echo $post->category_name; ?></p></div>
        <div class="content">
            <h2><?php echo $post->title; ?></h2>
            <p><?php echo $post->content; ?></p>
        </div>
        <div class="comments">
        <h2>Comments</h2>
        <div class="comment">
            <div class="comment">
                <div class="user"><p></p></div>
                <p></p>
            </div>
            <form method="POST">
                <div class="form-element">
                    <label for="comment">Comment:</label>
                    <input class="form-fields" type="text" name="comment" id="comment">
                </div>
                <div class="form-element">
                    <button type="submit">Comment</button>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; endif;?>