<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscriber extends Model
{
    use HasFactory;

    /**
     * Get the website associated with the Subscriber
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
