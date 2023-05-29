<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="login-page-container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <div class="message">
                <?php if(isset($messages)) {
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form id="login-form" action="login" method="POST">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button class="login-button" type="submit">Login</button>
                <a href="register" class="register-button">or click here to register</a>
            </form>
        </div>
    </div>
</body>