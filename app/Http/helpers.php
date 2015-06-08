<?php

use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

if ( !function_exists('getImageUrl')) {

    function getImageUrl(ProductImage $image) {
        return Storage::disk('s3')->getDriver()->getAdapter()->getClient()
                      ->getObjectUrl(Config::get('filesystems.disks.s3.bucket'),
                                     'image' . $image->id . '.' . $image->extension);
    }
}


