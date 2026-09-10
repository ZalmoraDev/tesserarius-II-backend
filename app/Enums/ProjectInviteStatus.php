<?php

namespace App\Enums;

/** Usage state of `ProjectInvite.php` */
enum ProjectInviteStatus: string
{
    case Pending = "pending";
    case Accepted = "accepted";

    case Declined = "declined";
    case Expired = "expired";
}