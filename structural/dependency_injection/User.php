<?php

namespace structural\dependency_injection;

class User {

    protected $userStorage;

    public function __construct ($userStorage) {
        $this->userStorage = $userStorage;
    }

    protected function validate ($email, $password) {
        if (strlen($email) > 3 && strlen($password) > 3) {
            return true;
        } else {
            return false;
        }
    }

    public function register (string $email, string $password) {
        if ($this->validate($email, $password)
            && $this->userStorage->save($email, $password)) {

            return true;
        } else {
            return false;
        }
    }
}