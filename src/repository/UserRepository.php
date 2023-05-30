<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT users.user_id, users.email, users.password, users.role, users_data.name, users_data.surname, users_data.company  
            FROM users
            INNER JOIN users_data ON users.user_id = users_data.uid
            WHERE users.email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['user_id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['role'],
            $user['company']
        );
    }

    public function changeUserData(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE users SET email = ?, password = ? WHERE user_id = ?
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getId()
        ]);

        $stmt = $this->database->connect()->prepare('
            UPDATE users_data SET name = ?, surname = ? WHERE uid = ?
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getId()
        ]);
    }
}