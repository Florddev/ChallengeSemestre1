<?php

namespace App\Enums;

enum Role: int {
    case Admin = 1;
    case Moderator = 2;
    case Author = 3;
    case User = 4;
}