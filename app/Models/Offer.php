<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;

class Offer extends Model
{
    protected $fillable = ['amount', 'accepted_at', 'rejected_at'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }

    #[Scope]
    public function byMe(Builder $query): Builder
    {
        return $query->where('bidder_id', Auth::user()?->id);
    }

    #[Scope]
    public function exclude(Builder $query, $offer): Builder
    {
        return $query->where('id', '!=', $offer->id);
    }
}
