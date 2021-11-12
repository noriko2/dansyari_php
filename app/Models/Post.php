<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 複数代入を可能にする
    protected $fillable = ['caption', 'post_image'];
}
