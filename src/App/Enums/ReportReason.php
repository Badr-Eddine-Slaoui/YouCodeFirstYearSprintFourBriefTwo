<?php

namespace App\Enums;

enum ReportReason: string {
    case SPAM = 'spam';
    case INAPPROPRIATE = 'inappropriate';
    case OTHER = 'other';
}

$reason = 'innapropriate';

ReportReason::SPAM->value === $reason;