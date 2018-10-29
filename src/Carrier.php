<?php

namespace Omniship\AustraliaPost;

use Omniship\Common\AbstractCarrier;
use Omniship\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * AustraliaPost Carrier provides a wrapper for AustraliaPost API.
 * Please have a look at links below to have a high-level overview and see the API specification
 *
 * @see https://developers.auspost.com.au/apis/pac/getting-started
 *
 */
class Carrier extends AbstractCarrier
{

    public function getName()
    {
        return 'Australia Post';
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }
    /**
     * @param  string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * Initialize this carrier with default parameters
     *
     * @param  array $parameters
     * @return $this
     */
    public function initialize(array $parameters = array())
    {
        $this->parameters = new ParameterBag;

        // set default parameters
        foreach ($this->getDefaultParameters() as $key => $value) {
            if (is_array($value)) {
                $this->parameters->set($key, reset($value));
            } else {
                $this->parameters->set($key, $value);
            }
        }

        Helper::initialize($this, $parameters);


        return $this;
    }

    public function getDefaultParameters()
    {
        $settings = parent::getDefaultParameters();
        // $settings['env'] = Config::ENV_DEVELOPMENT;
        // $settings['services'] = ServicoDePostagem::getAll();
        $settings['cepOrigem'] = '87013-210';
        $settings['cepDestino'] = '87509-645';
        $settings['ajustarDimensaoMinima'] = true;
        // $settings['dimensao'] = $dimensao;
        $settings['peso'] = 0.150; // 150 gramas

        return $settings;
    }

    public function quote(array $parameters = [])
    {
        return $this->createRequest('\Omniship\AustraliaPost\Message\AustraliaPostBoxRequest', $parameters);
    }

    public function track(array $options = [])
    {
    }
}
