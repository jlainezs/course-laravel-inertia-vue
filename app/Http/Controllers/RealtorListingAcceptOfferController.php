<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // accept offer
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        // reject others
        $listing->offers()->exclude($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with('success', "Offer #{$offer->id} accepted. Others offers rejected.");
    }
}
