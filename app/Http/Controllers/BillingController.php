<?php

namespace App\Http\Controllers;

use App\Models\BillingModel;
use App\Models\OrganizationModel;

class BillingController extends Controller
{
    public function index()
    {
        return view('billing');
    }

    public function printBilling($billingId) {
        $billing = BillingModel::find($billingId);
        $organization = OrganizationModel::first();

        return view('print-billing', compact('billing', 'organization'));
    }

    public function printAll() {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');
    
        $billings = BillingModel::with(['room', 'customer'])
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();
    
        $organization = OrganizationModel::first();

        return view('print-all', compact('billings', 'organization'));
    }
}