<link rel="stylesheet" href="<?=ROOT?>/assets/css/sign-in-up.css">

<div class="container">
    <div class="wrapper">
        <h1>Sign Up</h1>
        <form method="POST">
            <div class="form-element">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name">
            </div>
            <div class="form-element">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div class="form-element">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-element">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-element">
                <button type="submit">Sign Up</button>
            </div>
            <div class="form-element">
                <p>Already have an account? <a href="<?=ROOT?>/signin">Sign in</a></p>
            </div>
        </form>
    </div>
</div>