# SilverStripe Foxy Inventory

A simple inventory add-on for SilverStripe Foxy.

[![Build Status](https://travis-ci.org/dynamic/silverstripe-foxy-inventory.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-foxy-inventory)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-foxy-inventory/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-foxy-inventory/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-foxy-inventory/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-foxy-inventory/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-foxy-inventory/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-foxy-inventory)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-foxy-inventory/v/stable)](https://packagist.org/packages/dynamic/silverstripe-foxy-inventory)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-foxy-inventory/downloads)](https://packagist.org/packages/dynamic/silverstripe-foxy-inventory)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-foxy-inventory/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-foxy-inventory)
[![License](https://poser.pugx.org/dynamic/silverstripe-foxy-inventory/license)](https://packagist.org/packages/dynamic/silverstripe-foxy-inventory)


## Requirements

* SilverStripe ^4.0
* SilverStripe Foxy ^1.0
* SilverStripe Foxy Orders ^1.0

## Installation

```
composer require dynamic/silverstripe-foxy-inventory
```

## License

See [License](license.md)

## Example configuration (optional)

Apply the following DataExtensions to your base Product class:

```yaml

Dynamic\Products\Page\Product:
  extensions:
    - Dynamic\Foxy\Inventory\Extension\ProductInventoryManager
    - Dynamic\Foxy\Inventory\Extension\ProductExpirationManager
      
Dynamic\Products\Page\ProductController:
  extensions:
    - Dynamic\Foxy\Inventory\Extension\ProductControllerExtension
  
```

Also apply the following Extensions to Foxy classes:

```yaml
Dynamic\Foxy\Form\AddToCartForm:
  extensions:
    - Dynamic\Foxy\Inventory\Extension\AddToCartFormExtension
      
Dynamic\Foxy\Form\QuantityField:
  extensions:
    - Dynamic\Foxy\Inventory\Extension\QuantityFieldExtension

```

## Maintainers
 *  [Dynamic](http://www.dynamicagency.com) (<dev@dynamicagency.com>)
 
## Bugtracker
Bugs are tracked in the issues section of this repository. Before submitting an issue please read over 
existing issues to ensure yours is unique. 
 
If the issue does look like a new bug:
 
 - Create a new issue
 - Describe the steps required to reproduce your issue, and the expected outcome. Unit tests, screenshots 
 and screencasts can help here.
 - Describe your environment as detailed as possible: SilverStripe version, Browser, PHP version, 
 Operating System, any installed SilverStripe modules.
 
Please report security issues to the module maintainers directly. Please don't file security issues in the bugtracker.
 
## Development and contribution
If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.
