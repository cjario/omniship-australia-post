<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;


class AustraliaPostServiceRequest extends AbstractRequest
{
    protected $endpoint = '/postage/parcel/domestic/service.json';

    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('apiKey');

        $data = array(
            "from_postcode" => $this->getParameter('fromPostcode'),
            "to_postcode"   => $this->getParameter('toPostcode'),
            "length"        => $this->getParameter('length'),
            "width"         => $this->getParameter('width'),
            "height"        => $this->getParameter('height'),
            "weight"        => $this->getParameter('weight'),
        );

        return $data;
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setFromPostcode($value)
    {
        return $this->setParameter('fromPostcode', $value);
    }

    /**
     * @return string
     */
    public function getFromPostcode()
    {
        return $this->getParameter('fromPostcode');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setToPostcode($value)
    {
        return $this->setParameter('toPostcode', $value);
    }

    /**
     * @return string
     */
    public function getToPostcode()
    {
        return $this->getParameter('toPostcode');
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
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $params = $this->endpoint . '?'. http_build_query($data);
        $response = $this->sendRequest(self::GET, $params);
        return $this->response = new AustraliaPostServiceResponse($this, $response);
    }
}
