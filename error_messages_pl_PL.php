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

$error_empty = 'To pole nie może być puste.';
$error_number = 'Ten wpis powinien być liczbą.';
$error_text = 'Ten wpis powinien być tekstem.';
$error_date = "Ten wpis powinien być datą w formacie $format.";
$error_time = "Ten wpis powinien być czasem w formacie $format.";
$error_min = "Ten wpis powinien być co najmniej $min.";
$error_max = "Ten wpis powinien być co najwyżej $max.";
$error_min_char = "Ten wpis powinien zawierać co najmniej $min znak/i/ów.";
$error_max_char = "Ten wpis powinien zawierać co najwyżej $max znak/i/ów.";
$error_early = 'Data nie może być wcześniejsza niż dzisiaj.';
$error_late = "Data nie może być późniejsza niż ";
$error_format = 'Nieodpowiednio sformatowane dane.';
?>