<?php

require_once 'PasswordBuilder.php';

class PasswordBuilderImpl implements PasswordBuilder
{
    private $password;

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function build(): Password
    {
        return new Password($this->password);
    }
}