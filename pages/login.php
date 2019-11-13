<?php
require_once("lib/db-helper.php");
require_once("lib/models/ErrorMessage.class.php");

if (!empty($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $user = getUserByEMail($_POST['email']);
        if (password_verify($_POST['password'], $user->passwordHash)) {
            $_SESSION['uid'] = $user->uid;
            $_SESSION['isAdmin'] = $user->isAdmin;
            header("Location: index.php");
        } else {
            $error = new ErrorMessage(1);
        }
    }
} else if (isset($_SESSION['uid'])) {
    echo "<p>Sie sind bereits eingeloggt</p>";
}

if(!isset($_SESSION['uid'])) { ?>
    <div id="login" class="content flex-item flex-size-1">
        <div class="flex-container-center flex-container-login">
            <div class="login-form flex-item flex-size-1">
                <form method="post">
                    <input type="text" name="email" placeholder="Enter your email" required/>
                    <input type="password" name="password" placeholder="Enter your password" required/>
                    <button type="submit">Login</button>
                </form>
            </div>
            <div class="login-infobox flex-item flex-size-1 flex-container-reverse">
                <a class="flex-item" href="./index.php?id=reset-password">Passwort vergessen</a>
                <a class="flex-item" href="./index.php?id=register">Register</a>
            </div>
        </div>
    </div>
    <?php
}