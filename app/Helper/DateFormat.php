<?php

declare(strict_types=1);

namespace App\Helper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

trait DateFormat
{
    use HasFactory;

    protected function getCreatedAtAttribute(string $date): string
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function Montant(): string
    {
        return number_format($this->montant, 0, ',', ' ').' CFA';
    }

    public function getDateFormatAttribute(): string
    {
        return Carbon::parse($this->date)->format('d/m/Y');
    }

    public function getMontantFormatAttribute(): string
    {
        return number_format($this->montant, 0, ',', ' ').' CFA';
    }

    public function generateId(string $prefix)
    {
        $currentYear = Carbon::today()->format('Y');
        $prefix = $prefix.$currentYear.'-';

        return DB::transaction(function () use ($prefix) {
            // Verrouille le dernier identifiant de courrier enregistré dans la base de données pour la mise à jour
            $lastCourrier = self::where('matricule', 'like', $prefix.'%')->whereNotNull('matricule')
                ->latest('id')
                ->lockForUpdate()
                ->first(['matricule']);
            // Si aucun identifiant de courrier n'a été enregistré, définit le numéro de séquence à 0
            $sequence = 0;
            if ($lastCourrier) {
                // Récupère le numéro de séquence de l'identifiant de courrier précédent
                $sequence = (int) substr($lastCourrier->matricule, strlen($prefix));

            }

            // Incrémente le numéro de séquence et génère le nouvel identifiant de courrier
            $sequence++;
            $newCourrierNumber = $prefix.$sequence;
            // Met à jour le numéro de courrier de l'instance courante
            $this->matricule = $newCourrierNumber;
            $this->save();

            return $this;
        });
    }
}
