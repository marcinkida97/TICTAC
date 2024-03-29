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
                    <div class="workplaces-list">
                        <table>
                            <tr>
                                <td><input type="checkbox"></td><td><h3>Company</h3></td><td><h3>Workplace</h3></td><td><h3>Salary</h3></td>
                            </tr>
                            <?php foreach ($workplaces as $workplace): ?>
                            <tr>
                                <td><input type="checkbox"></td><td><?= $workplace->getCompany(); ?></td><td><?= $workplace->getWorkplace(); ?></td><td><?= $workplace->getSalary(); ?>zł</td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="workers-forms">
                    <div class="workplaces-add">
                        <form id="new-workplace-form" action="addWorkplace" method="POST">
                            <h2>Add workplace</h2>
                            <input name="new-workplace-name" type="text" placeholder="Workplace">
                            <input name="new-workplace-salary" type="text" placeholder="__zł / hour">
                            <br><button class="submit-button">Add</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>