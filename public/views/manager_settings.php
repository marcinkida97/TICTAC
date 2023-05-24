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
                <li><a href="workers" class="button">Workers</a></li>
                <li><a href="manager_settings" class="button">Settings</a></li>
                <li><a href="reports" class="button">Reports</a></li>
                <li><a href="/" class="button">Logout</a></li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="user-data">
                    <?php if(isset($user)) {
                        echo $user->getName() . " " . $user->getSurname() . "<br>";
                        echo $user->getRole() . "<br>";
                        echo $user->getCompany();
                    }
                    ?>
                </div>
                <div class="page-name">
                    <h1>Settings</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="settings">
                    <form id="manager-settings-form" action="changeUserData" method="POST">
                        <h2>Change user data</h2>
                        <h3>Name</h3>
                        <input name="settings-name" type="text" placeholder="Name">
                        <h3>Surname</h3>
                        <input name="settings-surname" type="text" placeholder="Surname">
                        <h3>Email</h3>
                        <input name="settings-email" type="email" placeholder="Email">
                        <h3>Password</h3>
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