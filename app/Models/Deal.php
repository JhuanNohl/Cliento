<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'company_id', 'contact_id', 'title', 'stage', 'value', 'probability', 'expected_close_date', 'notes'])]
class Deal extends Model
{
    public const STAGES = [
        'new' => 'Novo',
        'qualified' => 'Qualificado',
        'proposal' => 'Proposta',
        'won' => 'Ganho',
        'lost' => 'Perdido',
    ];

    protected function casts(): array
    {
        return [
            'expected_close_date' => 'date',
            'value' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
