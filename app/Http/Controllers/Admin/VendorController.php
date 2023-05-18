<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\VendorService;

class VendorController extends Controller
{
    private $vendorService;

    public function __construct(VendorService $service)
    {
        $this->vendorService = $service;
    }

    public function pendingVendorIndex()
    {
        try {
            $users = $this->vendorService->findAllPendingVendors();
            return view('pages.admin.vendors.pendingVendors.index', compact('users'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect('/admin/pending-vendors');
        }
    }

    public function approvedVendorIndex()
    {
        try {
            $users = $this->vendorService->findAllApprovedVendors();
            return view('pages.admin.vendors.approvedVendors.index', compact('users'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect('/admin/approved-vendors');
        }
    }

    public function approveVendor($id)
    {
        $response = $this->vendorService->approveVendor($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/pending-vendors');
    }

    public function rejectVendor($id)
    {
        $response = $this->vendorService->rejectVendor($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/pending-vendors');
    }
}
