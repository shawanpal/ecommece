<?php

use App\Site_details as SiteDetails;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('getSiteData')) {

    function getSiteData($value) {
        $siteValue = SiteDetails::where('name', $value)
                ->first();
        if (!empty($siteValue)) {
            return $siteValue->value;
        } else {
            return '';
        }
    }

}

