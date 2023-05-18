<?php

// this is autoload file

use App\Models\User;

function getVendorApprovalStatus($id)
{
    $vendor = User::doesntHave('vendor')->where('is_vendor', 1)->where('id', $id)->first();
    if (!empty($vendor)) {
        $is_approved = false;
    } else {
        $is_approved = true;
    }

    return $is_approved;
}


// 1. user ma xa tara vendor ma xaina. (which is not approved)
// 2. $vendor = current data ($vendor is not empty) thus it has to not approved
// 3. hence $is_approved is false.