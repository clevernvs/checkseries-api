<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findByEmail($userEmail);
}
