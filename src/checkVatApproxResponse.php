<?php

namespace CheckVat;

class checkVatApproxResponse
{
    /**
     * @var string $countryCode
     */
    public $countryCode;

    /**
     * @var string $vatNumber
     */
    public $vatNumber;

    /**
     * @var string $requestDate
     */
    public $requestDate;

    /**
     * @basetype boolean
     *
     * @var  bool $valid
     */
    public $valid;

    /**
     * @var string|null $traderName
     */
    public $traderName;

    /**
     * @basetype companyTypeCode
     * @pattern  [A-Z]{2}\-[1-9][0-9]?
     *
     * @var      string|null $traderCompanyType
     */
    public $traderCompanyType;

    /**
     * @var string $traderAddress
     */
    public $traderAddress;

    /**
     * @var string $traderStreet
     */
    public $traderStreet;

    /**
     * @var string $traderPostcode
     */
    public $traderPostcode;

    /**
     * @var string $traderCity
     */
    public $traderCity;

    /**
     * @var string $traderNameMatch One of the constants defined in checkVatService_matchCode
     */
    public $traderNameMatch;

    /**
     * @var string $traderCompanyTypeMatch One of the constants defined in checkVatService_matchCode
     */
    public $traderCompanyTypeMatch;

    /**
     * @var string $traderStreetMatch One of the constants defined in checkVatService_matchCode
     */
    public $traderStreetMatch;

    /**
     * @var string $traderPostcodeMatch One of the constants defined in checkVatService_matchCode
     */
    public $traderPostcodeMatch;

    /**
     * @var string $traderCityMatch One of the constants defined in checkVatService_matchCode
     */
    public $traderCityMatch;

    /**
     * @var string $requestIdentifier
     */
    public $requestIdentifier;
}
