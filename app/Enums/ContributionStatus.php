<?php

namespace App\Enums;

enum ContributionStatus: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case REFUNDED = 'refunded';
}
