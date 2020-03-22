<?php

use App\Site_detail as SiteDetails;
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

