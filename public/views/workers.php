<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/052875d05d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Workers</title>
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
                    <h1>Workers</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="workers-lists">
                    <div class="workers-list">
                        <table>
                            <tr>
                                <td><input type="checkbox"></td><td><h3>ID</h3></td><td><h3>Name</h3></td><td><h3>Surname</h3></td><td><h3>Role</h3></td><td><h3>Company</h3></td>
                            </tr>
                            <?php foreach ($workers as $worker): ?>
                            <tr>
                                <td><input type="checkbox"></td><td><?= $worker->getId(); ?></td><td><?= $worker->getName(); ?></td><td><?= $worker->getSurname(); ?></td><td><?= $worker->getRole(); ?></td><td><?= $worker->getCompany(); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="workplaces-list">
                        <table>
                            <tr>
                                <td><input type="checkbox"></td><td><h3>Workplace</h3></td><td><h3>Salary</h3></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Summer Garden</td><td>13zł</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Bar</td><td>15zł</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Kitchen</td><td>17zł</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="workers-forms">
                    <div class="workers-add">
                        <h2>Add worker</h2>
                        <h3>Name</h3>
                        <input name="settings-name" type="text" placeholder="FirstName LastName">
                        <h3>Position</h3>
                        <input name="settings-login" type="text" placeholder="position">
                        <br><button class="submit-button">Add</button>
                    </div>
                    <div class="workplaces-add">
                        <h2>Add workplace</h2>
                        <h3>Workplace</h3>
                        <input name="settings-name" type="text" placeholder="Workplace name">
                        <h3>Salary</h3>
                        <input name="settings-login" type="text" placeholder="__zł / hour">
                        <br><button class="submit-button">Add</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>