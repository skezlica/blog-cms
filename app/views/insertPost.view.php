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
            <button type="submit">Publish</button>
        </div>
    </form>
</div>