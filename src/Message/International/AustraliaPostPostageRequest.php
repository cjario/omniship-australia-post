<?php namespace Omniship\AustraliaPost\Message\International;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostPostageRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/international/calculate.json';


    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('apiKey');

        $data = array(
            "weight"       => $this->getParameter('weight'),
            "service_code" => $this->getParameter('parcelType'),
            "country_code" => $this->getParameter('countryCode')
        );

        return $data;
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setWeight($value)
    {
        return $this->setParameter('weight', $value);
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->getParameter('weight');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setCountryCode($value)
    {
        return $this->setParameter('countryCode', $value);
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->getParameter('countryCode');
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
        $endpoint = $this->endpoint . '?' . http_build_query($data);
        $response = $this->sendRequest(self::GET, $endpoint);
        return $this->response = new AustraliaPostPostageResponse($this, $response);
    }
}
