<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Message extends Model
{
    use HasFactory;
    use HasTrixRichText;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($message) {
            $message->trixRichText->each->delete();
            $message->trixAttachments->each->purge();
        });
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
