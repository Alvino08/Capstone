<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{

    // protected $fillable = ['original_text', 'summary_result'];
    protected $fillable = ['user_id', 'original_text', 'summary_result'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
