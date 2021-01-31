<?php

namespace CheckVat;

class checkVatApprox
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
     * @var string $traderName
     */
    public $traderName;

    /**
     * @basetype companyTypeCode
     * @pattern  [A-Z]{2}\-[1-9][0-9]?
     *
     * @var      string $traderCompanyType
     */
    public $traderCompanyType;

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
     * @var string $requesterCountryCode
     */
    public $requesterCountryCode;

    /**
     * @var string $requesterVatNumber
     */
    public $requesterVatNumber;
}
