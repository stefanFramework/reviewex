<?php


namespace App\Http\Entities;


class AuthenticatedUser
{
    public int $id;
    public string $userName;
    public string $password;
    public string $email;
}
