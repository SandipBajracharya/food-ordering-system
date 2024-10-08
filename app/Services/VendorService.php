<?php

namespace App\Services;

use App\Models\User;
use App\Models\Vendor;

class VendorService
{
    public function findOneById($id)
    {
        return Vendor::find($id);
    }

    public function findAll($limit = null, $offset = null, $conditions = [])
    {
        $vendors = Vendor::query();
        
        if (count($conditions) > 0) {
            foreach ($conditions as $key => $value) {
                $vendors = $vendors->where($key, $value);
            }
        }
        if (!empty($limit)) {
            $vendors = $vendors->take($limit);
        }
        if (!empty($offset)) {
            $vendors = $vendors->skip($offset);
        }
        return $vendors->get();
    }

    public function findAllPendingVendors()
    {
        return User::doesntHave('vendor')->where('is_vendor', 1)->orderBy('created_at', 'DESC')->get();
    }

    public function findAllApprovedVendors()
    {
        return User::has('vendor')->where('is_vendor', 1)->orderBy('created_at', 'DESC')->get();
    }

    public function approveVendor($id)
    {
        try {
            $user = User::find($id);
            $data = [
                'brand_name' => $user->username,
                'service' => 'na',
                'logo' => 'na',
                'image_cover' => 'na',
                'user_id' => $id,
                'is_active' => 1
            ];
            Vendor::create($data);
            $user->role_id = 2;     // role id of vendor
            $user->save();
            return ['status' => 'success', 'message' => 'Vendor is approved'];
        } catch (\Throwable $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function rejectVendor($id)
    {
        try {
            User::where('id', $id)->update(['is_vendor' => 0]);
            // send email to user
            return ['status' => 'success', 'message' => 'Vendor is rejected'];
        } catch (\Throwable $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function searchVendor($inputs)
    {
        $restaurants = Vendor::with(['user.products:name,status'])
            ->where(function ($query) use ($inputs) {
                $query->where('brand_name', 'LIKE', '%'.$inputs['search'].'%')
                    ->orWhere('service', 'LIKE', '%'.$inputs['search'].'%');
            })
            ->orWhereHas('user.products', function ($query) use ($inputs) {
                $query->where('name', 'LIKE', '%'.$inputs['search'].'%')
                    ->where('status', 'Available');
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        return $restaurants;
    }
}

