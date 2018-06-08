<?php
if(!defined('whPwK4QzToQ2omolUMYUeeRT3VedWQpbnIzi8Htm9eBzGMO5zCY0MZwhBmFH')) {
   die('');
}

/************************************************************************************
*    This class validates and sanitizes data received from HTML forms               *
*                                                                                   *
*    Copyright (C) 2018 Maciej Modzelewski <https://maciejmodzelewski.com/contact/> *
*                                                                                   *
*    This program is free software: you can redistribute it and/or modify           *
*    it under the terms of the GNU Affero General Public License as                 *
*    published by the Free Software Foundation, either version 3 of the             *
*    License, or (at your option) any later version.                                *
*                                                                                   *
*    This program is distributed in the hope that it will be useful,                *
*    but WITHOUT ANY WARRANTY; without even the implied warranty of                 *
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                  *
*    GNU Affero General Public License for more details.                            *
*                                                                                   *
*    You should have received a copy of the GNU Affero General Public License       *
*    along with this program.  If not, see <https://www.gnu.org/licenses/>.         *
*************************************************************************************/

$error_empty = 'Questo campo non può essere vuoto.';
$error_number = 'Questa voce dovrebbe essere un numero.';
$error_text = 'Questa voce dovrebbe essere un testo.';
$error_date = "Questa voce dovrebbe essere una data in un formato $format.";
$error_time = "Questa voce dovrebbe essere un tempo in un formato $format.";
$error_min = "Questa voce dovrebbe essere almeno $min.";
$error_max = "Questa voce dovrebbe essere al massimo $max.";
$error_min_char = "Questa voce dovrebbe avere almeno $min caratteri.";
$error_max_char = "Questa voce dovrebbe avere al massimo $max caratteri.";
$error_early = 'La data non può essere anteriore a oggi.';
$error_late = "La data non può essere successiva al ";
$error_format = 'Dati formattati in modo errato.';
?>