<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;


class AustraliaPostServiceRequest extends AbstractRequest
{
    protected $endpoint = '/postage/parcel/domestic/service.json';

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
        // Set the query params
        $queryParams = array(
            "from_postcode" => $data['fromPostcode'],
            "to_postcode" => $data['toPostcode'],
            "length" => $data['parcelLengthInCMs'],
            "width" => $data['parcelWidthInCMs'],
            "height" => $data['parcelHeighthInCMs'],
            "weight" => $data['parcelWeightInKGs']
        );

        $params = $this->endpoint . '?'. http_build_query($queryParams);

        $response = $this->sendRequest(self::GET, $params);
        return $this->response = new AustraliaPostServiceResponse($this, $response);
    }
}
