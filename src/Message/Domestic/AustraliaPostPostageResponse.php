<?php namespace Omniship\AustraliaPost\Message\Domestic;

use Omniship\Common\Message\AbstractResponse;

class AustraliaPostPostageResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        if (!empty($this->data)) {
            return true;
        }
        return false;
    }

    public function getBoxes()
    {
        if (!empty($this->data['sizes'])) {
            return $this->data;
        }
        return null;
    }
}
