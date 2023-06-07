<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../encryption/Encryptor.php';

class ManagerRepository extends Repository
{
    private $encryptor;

    public function __construct(Encryptor $encryptor)
    {
        parent::__construct();
        $this->encryptor = $encryptor;
    }

    public function addManager(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, role)
            VALUES (?, ?, ?)
        ');

        $encryptedPassword = $this->encryptor->encrypt($user->getPassword());

        $stmt->execute([
            $user->getEmail(),
            $encryptedPassword,
            $user->getRole()
        ]);

        $email = $user->getEmail();
        $stmt = $this->database->connect()->prepare('
            SELECT user_id FROM users WHERE email = :email'
        );
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_data (uid, name, surname, company)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $id['user_id'],
            $user->getName(),
            $user->getSurname(),
            $user->getCompany()
        ]);
    }
}