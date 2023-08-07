<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_index', 'text', 'topic_id', 'type', 'content'
    ];


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
