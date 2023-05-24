<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/052875d05d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Time</title>
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
                    <?php if(isset($user)) {
                        echo $user->getName() . " " . $user->getSurname() . "<br>";
                        echo $user->getRole() . "<br>";
                        echo $user->getCompany();
                    }
                    ?>
                </div>
                <div class="page-name">
                    <h1>Time</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="time-input">
                    <form id="time-input-form" action="addTime" method="POST">
                        <h2>Enter time</h2>
                        <h3>Start time</h3>
                        <input name="start-time" type="datetime-local">
                        <h3>End time</h3>
                        <input name="end-time" type="datetime-local">
                        <h3>Workplace</h3>
                        <select id="workplaces" name="workplaces">
                            <?php foreach ($workplaces as $workplace): ?>
                            <option value="<?= $workplace->getWorkplace(); ?>"><?= $workplace->getWorkplace(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button name="time-submit-button" class="submit-button" type="submit">Submit</button>
                        <div class="message">
                            <?php if(isset($messages)) {
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
                <div class="side-bar">
                    <p>This month: <?= $summary->getThisMonth(); ?></p>
                    <p>Overall: <?= $summary->getOverall(); ?></p>
                    <p>Salary: <?= $summary->getSalary(); ?>zł</p>
                </div>
            </section>
        </main>
    </div>
</body>