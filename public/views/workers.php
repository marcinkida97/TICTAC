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
                <li><a href="index" class="button">Logout</a></li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="user-data">
                    Manager data
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
                                <td><input type="checkbox"></td><td><h3>Name</h3></td><td><h3>Position</h3></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Jack Sparrow</td><td>Manager</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>John Snow</td><td>Bartender</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Kriss Kowalsky</td><td>Bartender</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td><td>Karine Rodrigue</td><td>Waiter</td>
                            </tr>
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