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

$error_empty = 'Dieses Feld kann nicht leer sein.';
$error_number = 'Dieser Eintrag sollte eine Nummer sein.';
$error_text = 'Dieser Eintrag sollte ein Text sein.';
$error_date = "Dieser Eintrag sollte ein Datum in einem Format $format sein.";
$error_time = "Dieser Eintrag sollte eine Uhrzeit im Format $format sein.";
$error_min = "Dieser Eintrag sollte mindestens $min sein.";
$error_max = "Dieser Eintrag sollte höchstens $max sein.";
$error_min_char = "Dieser Eintrag sollte mindestens $min Zeichen lang sein.";
$error_max_char = "Dieser Eintrag sollte maximal $max Zeichen haben.";
$error_early = 'Das Datum darf nicht früher als heute sein.';
$error_late = "Das Datum kann nicht später als ";
$error_format = 'Falsch formatierte Daten.';
?>