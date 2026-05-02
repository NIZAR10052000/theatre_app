<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'type', 'event_id', 'member_id', 'title', 'description', 'status', 'category', 'user_id'];

    // Un média appartient soit à un événement, soit à un membre
    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }
}