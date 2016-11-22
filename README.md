# CheckVat WebService Wrapper

## Introduction

A simple client for [VIES](https://ec.europa.eu/taxation_customs/business/vat/eu-vat-rules-topic/vies-vat-information-exchange-system-enquiries_en).


## Requirements

* PHP >= 5.6.0 (with [soap](http://se2.php.net/soap) support)

## Getting started


## Composer

```bash
$ composer require pemedina/checkvat
```

## Usage

The library can be included & used on any PHP application.

## Examples


``` php
<?php

use CheckVat\checkVat as Vat;
use CheckVat\checkVatService;

require __DIR__ . '/vendor/autoload.php';

$service = new checkVatService();

$param = new Vat;

$param->countryCode='ES';
$param->vatNumber='B78917457';
$result = $service->checkVat( $param);

var_dump ( $result);


```


## Feedback and questions

Found a bug or missing a feature? Don't hesitate to create a new issue here on GitHub.