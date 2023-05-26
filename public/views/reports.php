<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/052875d05d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Reports</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li><a href="workers" class="button">Workers</a></li>
                <li><a href="workplaces" class="button">Workplaces</a></li>
                <li><a href="manager_settings" class="button">Settings</a></li>
                <li><a href="reports" class="button">Reports</a></li>
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
                    <h1>Reports</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="reports">
                    <button class="button">Monthly</button>
                </div>
            </section>
        </main>
    </div>
</body>