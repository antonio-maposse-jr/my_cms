<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumDocuments extends Model
{
    use HasFactory;

    const DIARIO = 'DIARIO';
    const SEMANARIO = 'SEMANARIO';
    const DOCUMENT_TYPE = [
        self::DIARIO => 'DIARIO',
        self::SEMANARIO => 'SEMANARIO',
    ];
}
