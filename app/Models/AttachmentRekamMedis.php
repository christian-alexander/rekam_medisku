<?php

namespace App\Models;

use App\Models\RekamMedis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttachmentRekamMedis extends Model
{
    use HasFactory;

    public function rekam_medis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
