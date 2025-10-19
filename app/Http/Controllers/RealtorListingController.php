<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Throwable;

class RealtorListingController extends Controller
{
    public function index()
    {
        return inertia(
            'Realtor/Index',
            ['listings' => Auth::user()->listings],
        );
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(Listing $listing)
    {
        Gate::authorize('delete', $listing);
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted.');
    }

}
