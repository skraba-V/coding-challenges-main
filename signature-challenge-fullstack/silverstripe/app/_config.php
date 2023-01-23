<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);


// Object::add_extension('Parcel', 'RestfulServer');

// Object::add_extension('Parcel', 'SilverStripe\RestfulServer\Model\RestfulObject');
 

// Director::addRules(100, array(
//     'api/v1/Parcel' => 'Parcel_Controller',
//  ));

