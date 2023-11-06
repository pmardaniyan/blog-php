<?php

namespace App\Models;

use App\Entities\UserEntity;

class User extends Model
{
    protected $fileName = 'users';
    protected $entityClass = UserEntity::class;
}