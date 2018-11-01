<?php namespace Omniship\AustraliaPost\Message;

use Omniship\Common\Message\ResponseInterface;

class AustraliaPostPostageRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/domestic/calculate.json';

    /**
     * @return array
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('apiKey');
        return [];
    }


    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        // Define the service input parameters
        $fromPostcode = '2000';
        $toPostcode = '3000';
        $parcelLengthInCMs = 22;
        $parcelWidthInCMs = 16;
        $parcelHeighthInCMs = 7.7;
        $parcelWeightInKGs = 1.5;

        // Set the query params
        $queryParams = array(
            "from_postcode" => $fromPostcode,
            "to_postcode" => $toPostcode,
            "length" => $parcelLengthInCMs,
            "width" => $parcelWidthInCMs,
            "height" => $parcelHeighthInCMs,
            "weight" => $parcelWeightInKGs,
            "service_code" => 'AUS_PARCEL_REGULAR'
        );

        $params = $this->endpoint . '?'. http_build_query($queryParams);

        $response = $this->sendRequest(self::GET, $params);
        return $this->response = new AustraliaPostServiceResponse($this, $response);
    }
}
