<link rel="stylesheet" href="<?=ROOT?>/assets/css/sign-in-up.css">

<div class="container">
    <div class="wrapper">
        <h1>Sign In</h1>
        <form method="POST">
            <div class="form-element">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-element">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-element">
                <button type="submit">Sign In</button>
            </div>
            <div class="form-element">
                <p>Dosen’t have an account? <a href="<?=ROOT?>/signup">Sign up</a></p>
            </div>
        </form>
    </div>
</div>