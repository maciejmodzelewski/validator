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

$error_empty = 'This field cannot be empty.';
$error_number = 'This entry should be a number.';
$error_text = 'This entry should be a text.';
$error_date = "This entry should be a date in a format $format.";
$error_time = "This entry should be a time in a format $format.";
$error_min = "This entry should be at least $min.";
$error_max = "This entry should be at most $max.";
$error_min_char = "This entry should have at least $min characters.";
$error_max_char = "This entry should have at most $max characters.";
$error_early = 'The date cannot be earlier than today.';
$error_late = "The date cannot be later than ";
$error_format = 'Incorrectly formatted data.';
?>