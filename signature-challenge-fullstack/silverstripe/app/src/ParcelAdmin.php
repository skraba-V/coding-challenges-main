<?php

use SilverStripe\Admin\ModelAdmin;

class ParcelAdmin extends ModelAdmin
{
    private static $managed_models = [
        'Parcel'
    ];

    private static $url_segment = 'parcels';

    private static $menu_title = 'Parcels';
}