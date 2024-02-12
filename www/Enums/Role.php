<?php

namespace App\Enums;

enum Role: int {
    case User = 0;
    case Author = 1;
    case Moderator = 2;
    case Admin = 3;
}