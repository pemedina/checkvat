<?php

namespace CheckVat;

use SoapClient;

class checkVatService extends SoapClient
{

    private static $classmap = array(
        'checkVat'               => 'checkVat',
        'checkVatResponse'       => 'checkVatResponse',
        'checkVatApprox'         => 'checkVatApprox',
        'checkVatApproxResponse' => 'checkVatApproxResponse',
        'companyTypeCode'        => 'companyTypeCode',
        'matchCode'              => 'matchCode',
    );

    public function checkVatService(
        $wsdl = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl",
        $options = array()
    ) {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct ( $wsdl, $options );
    }

    /**
     *
     *
     * @param checkVat $parameters
     * @return checkVatResponse
     */
    public function checkVat(checkVat $parameters)
    {
        return $this->__soapCall ( 'checkVat', array($parameters), array(
                'uri'        => 'urn:ec.europa.eu:taxud:vies:services:checkVat',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param checkVatApprox $parameters
     * @return checkVatApproxResponse
     */
    public function checkVatApprox(checkVatApprox $parameters)
    {
        return $this->__soapCall ( 'checkVatApprox', array($parameters), array(
                'uri'        => 'urn:ec.europa.eu:taxud:vies:services:checkVat',
                'soapaction' => ''
            )
        );
    }

}

