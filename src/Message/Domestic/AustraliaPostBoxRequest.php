<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostBoxRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/domestic/size.json';

    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
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
        $response = $this->sendRequest(self::GET, $this->endpoint, $data);
        return $this->response = new AustraliaPostBoxResponse($this, $response);
    }
}
