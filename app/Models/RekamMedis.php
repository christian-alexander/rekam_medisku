<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function pasien(){
        return $this->belongsTo(User::class,'pasien_id');
    }

    public function tenaga_kesehatan(){
        return $this->belongsTo(User::class,'tenaga_kesehatan_id');
    }
}
