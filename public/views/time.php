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
                <li><a href="index" class="button">Logout</a></li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="user-data">
                    User data
                </div>
                <div class="page-name">
                    <h1>Time</h1>
                </div>
            </header>
            <section class="main-section">
                <div class="time-input">
                    <h2>Enter time</h2>
                    <h3>Start time</h3>
                    <input name="start-time" type="datetime-local">
                    <h3>End time</h3>
                    <input name="end-time" type="datetime-local">
                    <h3>Workplace</h3>
                    <select id="workplaces" name="workplaces">
                        <option value="1">Opcja 1</option>
                        <option value="2">Opcja 2</option>
                        <option value="3">Opcja 3</option>
                    </select>
                    <button class="submit-button">Submit</button>
                </div>
                <div class="side-bar">
                    <p>This month:</p>
                    <p>Overall:</p>
                    <p>Salary:</p>
                </div>
            </section>
        </main>
    </div>
</body>