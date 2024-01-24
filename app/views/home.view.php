<link rel="stylesheet" href="<?=ROOT?>/assets/css/global.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css">

<div class="navbar">
        <ul>
            <li><a href="<?=ROOT?>/home">Home</a></li>
            <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="<?=ROOT?>/signin">Sign In</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="<?=ROOT?>/signout">Sign Out</a></li>
            <?php endif; ?>
        </ul>
    </div>
<div class="container">
    <div class="wrapper">
        <h3>Hi, <?=$username?></h3>
        <h1>BLOG CMS</h1>
        <p>
            "Let your online journey begin here! Our blog-CMS project provides you with a powerful tool for creating, editing, and sharing inspirational and informative articles. Discover the simplicity, feature richness, and adaptability of our system that will effortlessly help you express your ideas and connect with your audience. Elevate your online experience with intuitive content management and aesthetically pleasing design. You're ready for an unforgettable journey into the world of blogging – start it now with our blog-CMS solution!"
        </p>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="<?=ROOT?>/dashboard">GO TO DASHBOARD</a>
        <?php else : ?>
            <a href="<?=ROOT?>/dashboard">SIGN IN</a>
        <?php endif; ?>
    </div>
</div>

