<?php

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

/**
* Input data validator class.
*/

class Validator {
    // language version of the user interface
    private $lang;
    
    public function __construct($lang) {
        $lang = $lang;
    }
    
    private function is_date($input) {
        if(preg_match("/^\d{4}-\d{2}-\d{2}$/", $input) === 1) {
            return checkdate((int)substr($input, 5, 2), (int)substr($input, -2, 2), (int)substr($input, 0, 4));
        } else {
            return false;
        }
    }
    
    private function regex($input, $regex) {
        return filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regex))) === $input;
    }
    
    public function inputValidator($input, $required, $type, $min=false, $max=false, $format='', $regex="/[\w\W]*/") {
        $input = trim($input);
        global $lang;
        require "error_messages_$lang.php";
        if($type === 'date') {
            $current_date = new DateTime("now");
            $min_date = (clone $current_date)->modify("+$min years")->format('Y-m-d');
            $max_date = (clone $current_date)->modify("+$max years")->format('Y-m-d');
        }
        switch(true) {
            case ($required && !isset($input)): return array(false, $error_empty);
            case ($required && !$this->regex($input, $regex)): return array(false, $error_format);
            case ($type === 'number' && !is_numeric($input)): return array(false, $error_number);
            case ($type === 'number' && ($input + 0) < $min): return array(false, $error_min);
            case ($type === 'number' && ($input + 0) > $max): return array(false, $error_max);
            case ($type === 'date' && !$this->is_date($input)): return array(false, $error_date);
            case ($type === 'date' && $input < $min_date): return array(false, $error_early);
            case ($type === 'date' && $input > $max_date): return array(false, $error_late.$max_date.'.');
            case ($type === 'time' && !$this->regex($input, $regex)): return array(false, $error_time);
            case ($type === 'text' && !is_string($input)): return array(false, $error_text);
            case ($type === 'text' && $min && strlen($input) < $min): return array(false, $error_min_char);
            case ($type === 'text' && $max && strlen($input) > $max): return array(false, $error_max_char);
            default: return array(true, filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
        }
    }
}