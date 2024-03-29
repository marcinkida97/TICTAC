<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/052875d05d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Workers</title>
</head>
<body>
    <div class="base-container">
        <?php include('manager_navigation.php') ?>
        <main>
            <?php include('header.php') ?>
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
                </div>
                <div class="workers-forms">
                    <div class="workers-add">
                        <form id="new-worker-form" action="addWorker" method="POST">
                            <h2>Add worker</h2>
                            <input name="new-worker-name" type="text" placeholder="Name">
                            <input name="new-worker-surname" type="text" placeholder="Surname">
                            <input name="new-worker-email" type="email" placeholder="email@poczta.pl">
                            <input name="new-worker-password" type="password" placeholder="password">
                            <input name="new-worker-role" type="text" placeholder="Role">
                            <br><button class="submit-button">Add</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>