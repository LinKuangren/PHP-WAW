<?php

namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\User;

class UserManager extends AbstractManager {

    public function add(User $user) {
        return $this->create(User::class, [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => $user->getCreatedAt(),
        ]);
    }

    public function findOneBy(array $clause){
        return $this->readOne(User::class, $clause);
    }

    public function edit(User $user)
    {
        return $this->update(User::class, [
            'password' => $user->getPassword()
        ], $user->getId());
    }

}