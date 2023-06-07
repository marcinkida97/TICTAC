<?php

interface Encryptor
{
    public function encrypt(string $text): string;
    public function decrypt(string $text): string;
}