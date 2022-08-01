<?php require "./inc/nav.php"; ?>
    <div class="container">
        <h4>Login</h4>
        <?php if (isset($errorMessage) and $errorMessage != ""){
            ?>
        <p>
            <?=$errorMessage?>
        </p>
        <?php } ?>
        <form action="http://localhost/polytech/Controller/LoginController.php" method="post" class="form">
            <input type="text" name="email" placeholder="Email" required="required">
            <input type="password" name="password" placeholder="Password" required="required">
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>
    </div>

<?php require "./inc/footer.php"; ?>
