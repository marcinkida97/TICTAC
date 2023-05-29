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