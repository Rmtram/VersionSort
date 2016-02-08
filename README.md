# VersionSort

[![Build Status](https://travis-ci.org/Rmtram/VersionSort.svg)](https://travis-ci.org/Rmtram/VersionSort)
[![Total
Downloads](https://poser.pugx.org/rmtram/version-sort/downloads)](https://packagist.org/packages/rmtram/version-sort)
[![Latest Stable
Version](https://poser.pugx.org/rmtram/version-sort/v/stable.png)](https://packagist.org/packages/rmtram/version-sort)

## Introduction

Library to sort a very simple version.

## Install

**Composer**
```
$ composer require rmtram/version-sort
```

**Basic**

[Source Download](https://github.com/Rmtram/VersionSort/archive/v1.0.0.zip)

Copy File => `src/VersionSort.php`

```
require '/path/to/VersionSort.php';
```

## Example

```php

$versions = array('v1.0.1', '1.30.3', 'version1.0.99', '1.0.4');
$vs = new Rmtram\VersionSort\VersionSort($versions);

// trimming v1.0.1 => 1.0.1 | version1.0.99 => 1.0.99
$vs->trim();

var_dump($vs->asc());
// result => ['1.0.1', '1.0.4', '1.0.99', '1.30.3']

var_dump($vs->desc());
// result => ['1.30.3', '1.0.99', '1.0.4', '1.0.1']

```