<?php

interface PasswordBuilder
{
    public function setPassword(string $password): void;
    public function build(): Password;
}