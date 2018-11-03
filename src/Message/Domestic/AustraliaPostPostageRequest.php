<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

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
     * @param  string $value
     * @return $this
     */
    public function setParcelType($value)
    {
        return $this->setParameter('parcelType', $value);
    }

    /**
     * @return string
     */
    public function getParcelType()
    {
        return $this->getParameter('parcelType');
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
            "weight" => $data['parcelWeightInKGs'],
            "service_code" => $this->getParameter('parcelType')
        );

        $params = $this->endpoint . '?'. http_build_query($queryParams);

        $response = $this->sendRequest(self::GET, $params);
        return $this->response = new AustraliaPostPostageResponse($this, $response);
    }
}
