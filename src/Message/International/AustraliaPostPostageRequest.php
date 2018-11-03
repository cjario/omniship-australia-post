<?php namespace Omniship\AustraliaPost\Message\International;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostPostageRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/international/calculate.json';

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
            "country_code" => $data['country_code'],
            "weight" => $data['weight'],
            "service_code" => $this->getParameter('parcelType')
        );

        $endpoint = $this->endpoint . '?'. http_build_query($queryParams);
        $response = $this->sendRequest(self::GET, $endpoint);
        return $this->response = new AustraliaPostPostageResponse($this, $response);
    }
}
