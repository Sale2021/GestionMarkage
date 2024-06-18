<?php

declare(strict_types=1);

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

trait DeleteAction
{
    public function supp(Model $delete): JsonResponse
    {
        $delete->delete();

        return response()->json([
            'success' => true,
            'message' => $delete ? class_basename($delete).' supprimer avec success ' : class_basename($delete).' non trouvé',
        ]);
    }
}
