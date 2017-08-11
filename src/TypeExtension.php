<?php

namespace Brazanation\Doctrine;

use Doctrine\DBAL;

class TypeExtension
{
    private static $available = [
        DocumentType::CPF => Types\CpfType::class,
        DocumentType::CNPJ => Types\CnpjType::class,
        DocumentType::CNH => Types\CnhType::class,
        DocumentType::PISPASEP => Types\PisPasepType::class,
        DocumentType::CNS => Types\CnsType::class,
        DocumentType::RENAVAM => Types\RenavamType::class,
    ];

    public static function register(DBAL\Connection $connection)
    {
        foreach (self::$available as $typeName => $typeClass) {
            DBAL\Types\Type::addType($typeName, $typeClass);
            $connection->getDatabasePlatform()->registerDoctrineTypeMapping($typeName, $typeName);
        }
    }
}
