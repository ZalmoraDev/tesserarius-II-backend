<?php

namespace App\Enums;

/** User roles within Project and Database context */
enum ProjectRole: string
{
    case Member = "member";
    case Admin = "admin";
    case Owner = "owner";
}