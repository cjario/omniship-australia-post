# Omniship: Australia Post


**Australia Post driver for the Omniship PHP shipping carrier library**

[Omniship](https://github.com/cjario/omniship-common) is a framework agnostic, multi-carrier shipping
library for PHP. This package implements Australia Post support for Omniship.

## Installation

Omniship is installed via [Composer](http://getcomposer.org/). To install, simply require `cjario/omniship-common` and `cjario/omniship-australia-post` with Composer:

```
composer require cjario/omniship-common cjario/omniship-australia-post
```


## Basic Usage

The following gateways are provided by this package:

* Australia Post

For general usage instructions, please see the main [Omniship](https://github.com/cjario/omniship-common)
repository.

### Basic example (Domestic)

```php
$carrier = \Omniship\Omniship::create('AustraliaPost_Domestic');  
$carrier->setApiKey('test_dHar4XY7LxsDOtmnkVtjNVWXLSlXsM');
Or
$carrier->setApiKey(Yii::$app->params['AUSPOST_API_KEY']);

        
// Get list of boxes provided by carrier
$resp = $carrier->box()->send();
print_r($resp->getData());

// Retrieve a list of available domestic postage services
 $serviceArr = [
     'fromPostcode' => '2000',
     'toPostcode' => '3000',
     'parcelLengthInCMs' => 22,
     'parcelWidthInCMs' => 16,
     'parcelHeighthInCMs' => 7.7,
     'parcelWeightInKGs' => 1.5,
 ];
 $resp = $carrier->service()->sendData($serviceArr);
 print_r($resp->getData());

// Calculate total delivery price
 $serviceArr = [
     'fromPostcode' => '2000',
     'toPostcode' => '3000',
     'parcelLengthInCMs' => 22,
     'parcelWidthInCMs' => 16,
     'parcelHeighthInCMs' => 7.7,
     'parcelWeightInKGs' => 1.5,
 ];
 $resp = $carrier->postage(['parcelType'=> 'AUS_PARCEL_EXPRESS'])->sendData($serviceArr);
 print_r($resp->getData());

```


## Support

If you are having general issues with Omniship, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omniship tag](http://stackoverflow.com/questions/tagged/omniship) so it can be easily found.


If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/cjario/omniship-australia-post/issues),
or better yet, fork the library and submit a pull request.