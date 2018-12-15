<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostPostageRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/domestic/calculate.json';

    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('apiKey');

        // Set the query params
        $data = array(
            "from_postcode" => $this->getParameter('fromPostcode'),
            "to_postcode"   => $this->getParameter('toPostcode'),
            "length"        => $this->getParameter('length'),
            "width"         => $this->getParameter('width'),
            "height"        => $this->getParameter('height'),
            "weight"        => $this->getParameter('weight'),
            "service_code"  => $this->getParameter('parcelType')
        );
        return $data;
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setFromPostCode($value)
    {
        return $this->setParameter('fromPostCode', $value);
    }

    /**
     * @return string
     */
    public function getFromPostCode()
    {
        return $this->getParameter('fromPostCode');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setToPostCode($value)
    {
        return $this->setParameter('toPostCode', $value);
    }

    /**
     * @return string
     */
    public function getToPostCode()
    {
        return $this->getParameter('toPostCode');
    }


    /**
     * @param  string $value
     * @return $this
     */
    public function setLength($value)
    {
        return $this->setParameter('length', $value);
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->getParameter('length');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setWidth($value)
    {
        return $this->setParameter('width', $value);
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->getParameter('width');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setHeight($value)
    {
        return $this->setParameter('height', $value);
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->getParameter('height');
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
        $params = $this->endpoint . '?' . http_build_query($data);

        $response = $this->sendRequest(self::GET, $params);
        return $this->response = new AustraliaPostPostageResponse($this, $response);
    }
}
