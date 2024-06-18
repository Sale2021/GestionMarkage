<?php

namespace App\Models;

use App\Helper\DateFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use DateFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'mois', 'montant'];

    /**
     * Get the student that owns the Payment
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
