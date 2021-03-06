<?php namespace Omniship\AustraliaPost\Message\International;

use Omniship\Common\Message\AbstractResponse;

class AustraliaPostServiceResponse extends AbstractResponse
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

}
