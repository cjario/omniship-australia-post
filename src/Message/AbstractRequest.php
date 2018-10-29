<?php
namespace Omniship\AustraliaPost\Message;

abstract class AbstractRequest extends \Omniship\Common\Message\AbstractRequest
{
    const POST = 'POST';
    const GET = 'GET';

    /**
     * @var string
     */
    protected $apiVersion = "";

    /**
     * @var string
     */
    protected $baseUrl = 'https://digitalapi.auspost.com.au';

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @return array
     */
    protected function sendRequest($method, $endpoint, array $data = null)
    {
        $response = $this->httpClient->request(
            $method,
            $this->baseUrl . $this->apiVersion . $endpoint,
            [
                'AUTH-KEY' => $this->getApiKey()
            ],
            ($data === null || empty($data)) ? null : json_encode($data)
        );
        
        return json_decode($response->getBody(), true);
    }
}
