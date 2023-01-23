<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\DatetimeField;
use SilverStripe\Forms\FileField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\RestfulServer\Model\RestfulDataObject;

class Parcel extends DataObject
{
    private static $db = [
        'ParcelReferenceId' => 'Varchar(255)',
        'RecipientName' => 'Varchar(255)',
        'RecipientSignature' => 'Text',
        'DeliveryTimestamp' => 'Datetime'
    ];

    private static $summary_fields = [
        'ParcelReferenceId',
        'RecipientName',
        'DeliveryTimestamp'
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('ParcelReferenceId', 'Parcel Reference Id'),
            TextField::create('RecipientName', 'Recipient Name'),
            DatetimeField::create('DeliveryTimestamp', 'Delivery Timestamp'),
            FileField::create('RecipientSignature', 'Recipient Signature')->setAllowedExtensions(['png'])
        );

        return $fields;
    }

    // static $extensions = array(
    //     'RestfulServer'
    // );

    
    // private static $extensions = [
    //     RestfulDataObject::class
    // ];

     
    
}


