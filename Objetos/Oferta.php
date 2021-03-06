<?php
/**
 * Creado con PhpStorm.
 * Copyright (c) ITNow 2016.
 * Autor: Franklyn Alejandro Sosa Pérez <fsosa@externos.itnow.com>
 * Fecha: 28/10/2016
 * Hora: 14:51
 */

namespace Objetos;


use Objetos\abstractas\AbstractaAnuncio;

class Oferta extends AbstractaAnuncio
{

    /**
     * Obtiene el tipo del anuncio
     * @return string
     */
    public function getTipo()
    {
        return self::TIPO_OFERTA;
    }
}