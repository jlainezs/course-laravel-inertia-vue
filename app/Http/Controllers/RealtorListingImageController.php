<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingImageController extends Controller
{
    /**
     * Renders the form
     */
    public function create(Listing $listing)
    {
        return inertia(
            'Realtor/ListingImage/Create',
            ['listing' => $listing,]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        dd('Works!');
    }
}
