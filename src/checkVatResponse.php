<?php

namespace CheckVat;

class checkVatResponse
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
     * @var      bool $valid
     */
    public $valid;

    /**
     * @var string|null $name
     */
    public $name;

    /**
     * @var string|null $address
     */
    public $address;
}
