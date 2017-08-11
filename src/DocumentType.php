<?php

namespace Brazanation\Doctrine;

use Doctrine\DBAL;

abstract class DocumentType extends DBAL\Types\StringType
{
    const CPF = 'cpf';

    abstract public function factory($number);

    abstract public function getLength();

    abstract public function isFixed();

    /**
     * Converts a value from its PHP representation to its database representation
     * of this type.
     *
     * @param \Brazanation\Documents\Cnpj $value The value to convert.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return null|string The database representation of the value.
     */
    public function convertToDatabaseValue($value, DBAL\Platforms\AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        return (string)$value;
    }

    /**
     * Converts a value from its database representation to its PHP representation
     * of this type.
     *
     * @param string $value The value to convert.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return null|\Brazanation\Documents\Cnpj The PHP representation of the value.
     */
    public function convertToPHPValue($value, DBAL\Platforms\AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        return $this->factory($value);
    }

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, DBAL\Platforms\AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = $this->getLength();
        $fieldDeclaration['fixed'] = $this->isFixed();
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }
}
