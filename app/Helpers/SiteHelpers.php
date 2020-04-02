<?php

use Illuminate\Support\Facades\URL;
use App\Site_detail as SiteDetails;
use App\Attribute;
use App\Category;
use App\User;

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
        if (!empty($productCategories)) {
            $productCategories = json_decode($productCategories->value);
            $category_html = '';
            foreach ($productCategories as $productCategory) {
                $category = Category::where(['id' => $productCategory])
                        ->first();
                $category_html .= '<a href="' . url('shop/category/' . $category->alias) . '">' . $category->name . '</a>, ';
            }
            return rtrim($category_html, ', ');
        }
    }

}

if (!function_exists('product_url')) {

    function product_url($alias) {
        return URL('/shop/product/' . $alias);
    }

}

if (!function_exists('product_rating')) {

    function product_rating($id) {
        return '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
    }

}
if (!function_exists('get_author_name')) {
    
    function get_author_name($id){
        $author = User::where(['id' => $id])
                ->first();
        if(!empty($author)){
            return $author->first_name.' '.$author->last_name;
        }
    }
}
