<?php
/**
 * Creado con PhpStorm.
 * Copyright (c) ITNow 2016.
 * Autor: Franklyn Alejandro Sosa Pérez <fsosa@externos.itnow.com>
 * Fecha: 28/10/2016
 * Hora: 13:04
 */

namespace Objetos\interfaces;

/**
 * Interface IAnuncios
 * @package Objetos\interfaces
 */
interface IAnuncios
{
    const TIPO_ARTICULO = 'A';
    const TIPO_OFERTA = 'O';
    const TIPO_DESCUENTO = 'D';
    /**
     * Obtiene el tipo del anuncio
     * @return string
     */
    public function getTipo();
}