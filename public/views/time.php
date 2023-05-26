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
                    <h2><?php echo $user->getName() . " " . $user->getSurname() . "<br>"; ?></h2>
                    <h3><?php echo $user->getRole() . "<br>"; ?></h3>
                    <h3><?php echo $user->getCompany(); ?></h3>
                </div>
                <div class="page-name">
                    <h1>Time</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="div-input">
                    <form id="input-form" action="addTime" method="POST">
                        <h2>Enter time</h2>
                        <h3>Start time</h3>
                        <input name="start-time" type="datetime-local">
                        <h3>End time</h3>
                        <input name="end-time" type="datetime-local">
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
                    <h3>This month: <?= $summary->getThisMonth(); ?></h3><br>
                    <h3>Overall: <?= $summary->getOverall(); ?></h3><br>
                    <h3>Salary: <?= $summary->getSalary(); ?>zł</h3>
                </div>
            </section>
        </main>
    </div>
</body>