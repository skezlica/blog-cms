<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">

<div class="post">
    <?php if(!empty($errors)):?>
            <div class="alert">
                <?= implode("<br>", $errors) ?>
            </div>
        <?php endif; ?>
    <form method="POST">
        <div class="form-element">
            <label for="category_id">Category:</label>
            <select class="form-fields" name="category_id" id="category_id">
                <option value="0"></option>
                <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-element">
            <label for="title">Title:</label>
            <input class="form-fields" type="text" name="title" id="title">
        </div>
        <div class="form-element">
            <label for="content">Content:</label>
            <textarea class="form-fields" name="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-element">
            <button type="submit">Publish</button>
        </div>
    </form>
</div>

<div class="post">
<h2>template</h2>
    <div class="user"><p>stefannasic00</p></div>
    <div class="category"><p>Sport</p></div>
    <div class="content">
        <h2>What is Lorem Ipsum?</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="comments">
        <h2>Comments</h2>
        <div class="comment">
            <div class="comment">
                <div class="user"><p>stefannasic00</p></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="comment">
                <div class="user"><p>stefannasic00</p></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
</div>>

<?php foreach ($data['posts'] as $post): ?> 
    <div class="post">
        <div class="user"><p><?php echo $post->user_id; ?></p></div>
        <div class="category"><p><?php echo $post->category_id; ?></p></div>
        <div class="content">
            <h2><?php echo $post->title; ?></h2>
            <p><?php echo $post->content; ?></p>
        </div>
    </div>
</div>
<?php endforeach; ?>