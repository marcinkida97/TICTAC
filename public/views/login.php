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
            <form action="login" method="POST">
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="username" type="text" placeholder="username">
                <input name="password" type="password" placeholder="password">
                <button class="login-button" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>