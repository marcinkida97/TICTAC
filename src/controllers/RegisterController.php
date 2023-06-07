<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/ManagerRepository.php';
require_once __DIR__.'/../encryption/PasswordBuilderImpl.php';

class RegisterController extends AppController {
    private $defaultId = 0;
    private $defaultRole = "manager";
    private $managerRepository;
    private $passwordBuilder;

    public function __construct() {
        parent::__construct();
        $this->passwordBuilder = new PasswordBuilderImpl();
        $this->managerRepository = new ManagerRepository(new MyEncryptor());
    }

    public function register(): void {
        $this->render('register');
    }

    public function addManager(): void {
        if ($this->isPost()) {
            $user = new User(
                $this->defaultId,
                $_POST['email'],
                $_POST['password'],
                $_POST['name'],
                $_POST['surname'],
                $this->defaultRole,
                $_POST['company']
            );
            $this->managerRepository->addManager($user);
            $this->render('login', ['messages' => ['Registration done correctly!']]);
        } else {
            $this->render('register', ['messages' => ['Error during manager creation!']]);
        }
    }
}