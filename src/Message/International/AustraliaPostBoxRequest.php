<?php namespace Omniship\AustraliaPost\Message\International;

use Omniship\Common\Message\ResponseInterface;
use Omniship\AustraliaPost\Message\AbstractRequest;

class AustraliaPostBoxRequest extends AbstractRequest
{


    protected $endpoint = '/postage/parcel/international/service.json';

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
            "country_code" => $data['country_code'],
            "weight" => $data['weight'],
        );

        $endpoint = $this->endpoint . '?'. http_build_query($queryParams);
        $response = $this->sendRequest(self::GET, $endpoint);
        return $this->response = new AustraliaPostBoxResponse($this, $response);
    }
}
