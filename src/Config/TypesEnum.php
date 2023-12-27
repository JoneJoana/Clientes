<?php

namespace App\Config;

enum TypesEnum: int
{
    case RRHH = 0;
    case Directivo = 1;
    CASE Comercial = 2;

    public function getLabel(): string 
    {
        return match($this) {
            self::RRHH => 'RRHH',
            self::Directivo => 'Directivo',
            self::Comercial => 'Comercial'
        };
    }

}
