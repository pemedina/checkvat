<?php

namespace CheckVat;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use SoapClient;
use SoapFault;
use SoapHeader;

class checkVatService extends SoapClient
{
    /**
     * Namespace for service calls.
     */
    const SERVICE_NAMESPACE = 'urn:ec.europa.eu:taxud:vies:services:checkVat';

    /**
     * Default class mapping for this service.
     *
     * @var array
     */
    private static $classMap = [
        'checkVat'               => 'checkVat',
        'checkVatApprox'         => 'checkVatApprox',
        'checkVatApproxResponse' => 'checkVatApproxResponse',
        'checkVatResponse'       => 'checkVatResponse',
        'matchCode'              => 'matchCode',
    ];

    /**
     * Service Constructor
     *
     * @param  string  $wsdl  The location of the WSDL file.
     * @param  array  $options  Any additional parameters to add to the service.
     *
     * @throws SoapFault
     */
    public function __construct(string $wsdl = null, array $options = [])
    {
        // Use the optional WSDL file location if it is supplied.
        $wsdl = is_null($wsdl) ? 'https://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl' : $wsdl;

        // Add the classmap to the options.
        foreach (self::$classMap as $serviceClassName => $mappedClassName) {
            if ( ! isset($options['classmap'][$serviceClassName])) {
                $options['classmap'][$serviceClassName] = $mappedClassName;
            }
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * Service call proxy.
     *
     * @param  string  $serviceName  The name of the service being called.
     * @param  array  $parameters  The parameters being supplied to the service.
     * @param  SOAPHeader[]  $requestHeaders  An array of SOAPHeaders.
     *
     * @return mixed The service response.
     */
    protected function callProxy(string $serviceName, array $parameters = null, array $requestHeaders = null)
    {
        $result = $this->__soapCall(
            $serviceName,
            $parameters,
            [
                'uri'        => 'http://tempuri.org/',
                'soapaction' => '',
            ],
            ! empty($requestHeaders) ? array_filter($requestHeaders) : null,
            $responseHeaders
        );

        if ( ! empty($responseHeaders)) {
            foreach ($responseHeaders as $headerName => $headerData) {
                $this->$headerName = $headerData;
            }
        }

        return $result;
    }

    /**
     * Build and populate a SOAP header.
     *
     * @param  string  $headerName  The name of the services SOAP Header.
     * @param  array|object  $rawHeaderData  Any data that can be mapped to the SOAP Header. Public properties of objects will be used if an object is supplied.
     * @param  string  $namespace  The namespace which will default to this service's namespace.
     *
     * @throws ReflectionException
     */
    public function assignSoapHeader(string $headerName, $rawHeaderData = null, string $namespace = self::SERVICE_NAMESPACE)
    {
        // Is there a corresponding property of this service for the requested SOAP Header?
        // Is there a mapped class for this SOAP Header?
        // Do we have any data to populate the SOAP Header with?
        if (property_exists($this, $headerName) && isset(self::$classMap[$headerName]) && ! empty($rawHeaderData)) {
            // Start with no data for the SOAP Header.
            $dataForSoapHeader = [];
            $mappedData        = [];

            // Get the mapped class and get the properties defined for the SOAP Header.
            $reflectedHeader           = new ReflectionClass(self::$classMap[$headerName]);
            $reflectedHeaderProperties = $reflectedHeader->getProperties();

            // Produce an array of public data from an object.
            if (is_object($rawHeaderData)) {
                $reflectedData           = new ReflectionClass($rawHeaderData);
                $reflectedDataProperties = $reflectedData->getProperties(ReflectionProperty::IS_PUBLIC);
                $mappedData              = [];
                foreach ($reflectedDataProperties as $property) {
                    $propertyName              = $property->name;
                    $mappedData[$propertyName] = $rawHeaderData->$propertyName;
                }
            } elseif (is_array($rawHeaderData)) {
                $mappedData = $rawHeaderData;
            }

            // Process the data as an array.
            if ( ! empty($mappedData)) {
                foreach ($reflectedHeaderProperties as $property) {
                    $propertyName = $property->name;
                    if (isset($mappedData[$propertyName])) {
                        $dataForSoapHeader[$propertyName] = $mappedData[$propertyName];
                    }
                }
            }

            // Build the SOAP Header and assign it the corresponding property.
            $this->$headerName = new SoapHeader($namespace, $headerName, $dataForSoapHeader);
        }
    }

    /**
     * @param  checkVat  $parameters
     *
     * @return checkVatResponse
     */
    public function checkVat(checkVat $parameters): checkVatResponse
    {
        return $this->callProxy('checkVat', [$parameters]);
    }

    /**
     * @param  checkVatApprox  $parameters
     *
     * @return checkVatApproxResponse
     */
    public function checkVatApprox(checkVatApprox $parameters)
    {
        return $this->callProxy('checkVatApprox', [$parameters]);
    }
}
