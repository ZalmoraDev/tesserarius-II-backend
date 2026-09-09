<?php

namespace App\Enums;

/** Used in Router comparisons for access control.
 * Uses UserRole and adds non-project access roles (Anyone, Authenticated) */
enum ProjectRole: int
{
    // TODO: look into maybe reworking

    // Public access
    case Anyone = 0;
    case Authenticated = 1;

    // Project-role access
    case Member = 2;
    case Admin = 3;
    case Owner = 4;
}