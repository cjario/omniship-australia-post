<?php namespace Omniship\AustraliaPost\Message\International;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostServiceRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/international/service.json';


    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('apiKey');

        $data = array(
            "weight"       => $this->getParameter('weight'),
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
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $endpoint = $this->endpoint . '?'. http_build_query($data);
        $response = $this->sendRequest(self::GET, $endpoint);
        return $this->response = new AustraliaPostServiceResponse($this, $response);
    }
}
