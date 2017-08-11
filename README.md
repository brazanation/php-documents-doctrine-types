Doctrine Types for Brazilian Documents
==========================================

[![Build Status](https://travis-ci.org/brazanation/php-documents-doctrine-types.svg?branch=master)](https://travis-ci.org/brazanation/php-documents-doctrine-types)
[![StyleCI](https://styleci.io/repos/99854995/shield?branch=master)](https://styleci.io/repos/99854995)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/brazanation/php-documents-doctrine-types/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/brazanation/php-documents-doctrine-types/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/brazanation/php-documents-doctrine-types/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/brazanation/php-documents-doctrine-types/?branch=master)


### Installation

```sh
composer require brazanation/document-doctrine-types dev-master
```

### How to Use?

First of all, register the Document Types after Doctrine Connection.

```php
// bootstrap.php

// ... other code
$connection = \Doctrine\DBAL\DriverManager::getConnection($conn, $config, new \Doctrine\Common\EventManager());

\Brazanation\Doctrine\TypeExtension::register($connection);

// ... more code
```

Define the entity's property as the document

```php
/**
 * @Entity @Table(name="persons")
 */
class Person
{
    /**
     * @Id
     * @Column(type="cpf")
     * @var \Brazanation\Documents\Cpf
     */
    private $cpf;

    public function __construct(\Brazanation\Documents\Cpf $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
}
```

### Available Types

* CPF (Registration of individuals or Tax Identification)