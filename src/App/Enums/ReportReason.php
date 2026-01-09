<?php

namespace App\Enums;

enum ReportReason: string {
    case SPAM = "spam";
    case EXPLICIT_CONTENT = "explicit content";
    case INSULT = "insult";
    case RACIST_CONTENT = "racist content";
    case OFFENSIVE = "offensive";
    case ABUSE = "abuse";
    case COPYRIGHT = "copyright";
    case OTHER = "other";
}