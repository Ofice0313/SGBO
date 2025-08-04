<?php

namespace App\Enums;

enum Role:string
{
    case Admin = 'ADMIN';
    case User = 'USER';

    public function label(): string
    {
        return match($this) {
            self::Admin => 'ADMIN',
            self::User => 'USER',
        };
    }

    public function isAdmin(): bool
    {
        return $this === self::Admin;
    }

    public function isUser(): bool
    {
        return $this === self::User;
    }
}
