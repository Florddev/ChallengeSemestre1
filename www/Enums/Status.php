<?php

namespace App\Enums;

enum Status: int {
    case Unvalidated = 1;
    case Validated = 2;
    case Deactivated = 3;
    case Banned = 4;
}