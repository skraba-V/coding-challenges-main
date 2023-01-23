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
use SS_HTTPRequest;
use SS_HTTPResponse;

class ParcelApiController extends Parcel {
    public function getParcels(SS_HTTPRequest $request) {
        $parcels = Parcel::get();
        return json_encode($parcels->toArray());
    }
    public function updateParcel(SS_HTTPRequest $request) {
        $parcelId = $request->param('ID');
        $parcel = Parcel::get()->byID($parcelId);
        if (!$parcel) {
            return $this->httpError(404, 'Parcel not found');
        }
        $data = json_decode($request->getBody(), true);
        $parcel->update($data);
        return json_encode($parcel->toArray());
    }
}

