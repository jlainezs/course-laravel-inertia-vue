<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        // accept offer
        $offer->update(['accepted_at' => now()]);

        // reject others
        $offer->listing->offers()->exclude($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with('success', "Offer #{$offer->id} accepted. Others offers rejected.");
    }
}
