<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model
{
    use HasFactory;

    /**
     * Get all of the post for the Website
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(WebsitePost::class);
    }

    /**
     * Get all of the subscribers for the Website
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class, 'website_id', 'uid');
    }
}
