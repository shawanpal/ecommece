<?php

use App\Site_detail as SiteDetails;
use App\Attribute;
use App\Category;

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

if (!function_exists('getProductData')) {

    function getProductData($id, $name) {
        $productValue = Attribute::where(['product_id' => $id, 'name' => $name])
                ->first();
        if (!empty($productValue)) {
            return $productValue->value;
        } else {
            return '';
        }
    }

}

if (!function_exists('getProductCategories')) {
    
    function getProductCategories($id) {
        $productCategories = Attribute::where(['product_id' => $id, 'name' => 'categories'])
                ->first();
        $productCategories = json_decode($productCategories->value);
        $category_html = '';
        foreach ($productCategories as $productCategory) {
            $category = Category::where(['id' => $productCategory])
                ->first();
            $category_html .= '<a href="'.url('shop/category/'.$category->alias).'">'.$category->name.'</a>, ';
        }
        return rtrim($category_html,', ');
    }
}