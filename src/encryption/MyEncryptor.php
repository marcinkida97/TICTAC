<?php

require_once 'Encryptor.php';

class MyEncryptor implements Encryptor
{
    public function encrypt(string $text): string
    {
        $encryptedText = '';

        foreach (str_split($text) as $char) {
            $encryptedChar = $this->encryptChar($char);
            $encryptedText .= $encryptedChar;
        }

        return $encryptedText;
    }

    public function decrypt(string $text): string
    {
        $decryptedText = '';

        foreach (str_split($text) as $char) {
            $decryptedChar = $this->decryptChar($char);
            $decryptedText .= $decryptedChar;
        }

        return $decryptedText;
    }

    private function encryptChar(string $char): string
    {
        $ascii = ord($char);
        $offset = 3;
        $encryptedAscii = ($ascii + $offset) % 256;
        return chr($encryptedAscii);
    }

    private function decryptChar(string $char): string
    {
        $ascii = ord($char);
        $offset = 3;
        $decryptedAscii = ($ascii - $offset + 256) % 256;
        return chr($decryptedAscii);
    }
}