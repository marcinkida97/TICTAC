<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/052875d05d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Settings</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li><a href="time" class="button">Time</a></li>
                <li><a href="worker_settings" class="button">Settings</a></li>
                <li><a href="/" class="button">Logout</a></li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="user-data">
                    <h2><?php echo $user->getName() . " " . $user->getSurname() . "<br>"; ?></h2>
                    <h3><?php echo $user->getRole() . "<br>"; ?></h3>
                    <h3><?php echo $user->getCompany(); ?></h3>
                </div>
                <div class="page-name">
                    <h1>Settings</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="div-input">
                    <form id="input-form" action="changeUserData" method="POST">
                        <h2>Change user data</h2>
                        <input name="settings-name" type="text" placeholder="Name">
                        <input name="settings-surname" type="text" placeholder="Surname">
                        <input name="settings-email" type="email" placeholder="Email">
                        <input name="settings-password" type="password" placeholder="password">
                        <button class="submit-button">Submit</button>
                    </form>
                    <?php if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>