<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Documents\Cpf;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class CpfType extends StringType
{
    const NAME = 'cpf';
    const FIELD_LENGTH = 11;
    const FIELD_FIXED = true;

    public function getName()
    {
        return self::NAME;
    }

    /**
     * Converts a value from its PHP representation to its database representation
     * of this type.
     *
     * @param \Brazanation\Documents\Cpf $value The value to convert.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return null|string The database representation of the value.
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
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
     * @return null|\Brazanation\Documents\Cpf The PHP representation of the value.
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        return new Cpf($value);
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = $this->getDefaultLength($platform);
        $fieldDeclaration['fixed'] = self::FIELD_FIXED;
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultLength(AbstractPlatform $platform)
    {
        return self::FIELD_LENGTH;
    }
}
