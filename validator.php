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
    /**
     * Language version of the error messages
     * 
     * @var language
     */
    private $language;
    
    /**
     * Constructor of class Validator
     * 
     * @param $lang language version of the user interface
     */
    public function __construct($lang) {
        $this->language = $lang;
    }
    
    /**
     * Reformats the supplied format to a valid date format
     * for example YYYY-MM-DD to Y-m-d or YY-MM-DD to y-m-d
     * 
     * @param $format an input data to check
     * 
     * @return a valid date format
     */
    private function reformat($format) {
        $chars = str_split($format);
        $date_format = '';
        foreach ($chars as $char) {
            if ((ctype_alpha($char) && !stristr($date_format, $char)) || ctype_punct($char)) {
                if ($char !== 'Y') {
                    $char = strtolower($char);
                } elseif (substr_count($format, 'Y') == 2) {
                    $char = 'y';
                }
                $date_format = $date_format.$char;
            }
        }
        return $date_format;
    }
    
    /**
     * Checks if an input data is a date in a specified format
     * 
     * @param $input an input data to check
     * @param $format a date format
     * 
     * @return true if an input is a valid date, false otherwise
     */
    private function is_date($input, $format) {
        if (strlen($input) == strlen($format)) {
            $date_array = $this->extract_date($input, $format);
            return checkdate($date_array[1], $date_array[0], $date_array[2]);
        }
        return false;
    }
    
    /**
     * Extracts parts of an input that represent numerical 
     * values of a day, a month and a year in supplied format
     * 
     * @param $input an input data
     * @param $format a date format
     * 
     * @return an array that contains day, month and year in that order, 
     * false if size of input and format are different
     */
    private function extract_date($input, $format) {
        $format_chars = str_split(strtolower($format));
        $input_chars = str_split($input);
        $day = '';
        $month = '';
        $year = '';
        if (count($format_chars) == count($input_chars)) {
            for ($i = 0; $i < count($format_chars); $i++) {
                if ($format_chars[$i] === 'd') {
                    $day = $day.$input_chars[$i];
                } elseif ($format_chars[$i] === 'm') {
                    $month = $month.$input_chars[$i];
                } elseif ($format_chars[$i] === 'y') {
                    $year = $year.$input_chars[$i];
                }
            }
            return array($day, $month, $year);
        }
        return false;
    }
    
    /**
     * Compares input data with min or max date in supplied format
     * 
     * @param $input an input data that is a date
     * @param $date min or max date for comparison
     * @param $format a date format
     * 
     * @return an integer value that is the difference between dates
     */
    private function compare_dates($input, $date, $format) {
        $i = $this->extract_date($input, $format);
        $d = $this->extract_date($date, $format);
        return "$i[2].$i[1].$i[0]" - "$d[2].$d[1].$d[0]";
    }
    
    /**
     * Checks an input data using provided regular expression
     * 
     * @param $input an input data to check
     * @param $regex a regular expression (PCRE)
     * 
     * @return the checked input if it matches regex, false otherwise
     */
    private function regex($input, $regex) {
        return filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regex))) === $input;
    }
    
    /**
     * Validates an input data and sanitises the output
     * 
     * @param $input an input data for validation
     * @param $required true|false - indicate whether the input is required or not
     * @param $type 'number'|'date'|'time'|'text' - the type of the input data
     * @param $min numeric value|false if not required (default) - a minimum value for the input data
     * @param $max numeric value|false if not required (default) - a maximum value for the input data
     * @param $format 'DATE-FORMAT'|empty string (default) - a date format related to is_date() output
     * @param $regex  'PCRE'|'[\w\W]*' (default)- a regular expression (PCRE)
     * 
     * @return array(false, $error_message)|array(true, $sanitised_input)
     */
    public function input_validator($input, $required, $type, $min=false, $max=false, $format='', $regex="/[\w\W]*/") {
        $input = trim($input);
        require "error_messages_$this->language.php";
        if($type === 'date') {
            $current_date = new DateTime("now");
            $min_date = (clone $current_date)->modify("+$min years")->format($this->reformat($format));
            $max_date = (clone $current_date)->modify("+$max years")->format($this->reformat($format));
        }
        switch(true) {
            case ($required && !isset($input)): return array(false, $error_empty);
            case ($required && !$this->regex($input, $regex)): return array(false, $error_format);
            case ($type === 'number' && !is_numeric($input)): return array(false, $error_number);
            case ($type === 'number' && ($input + 0) < $min): return array(false, $error_min);
            case ($type === 'number' && ($input + 0) > $max): return array(false, $error_max);
            case ($type === 'date' && !$this->is_date($input,$format)): return array(false, $error_date);
            case ($type === 'date' && $this->compare_dates($input, $min_date, $format) < 0): return array(false, $error_early);
            case ($type === 'date' && $this->compare_dates($input, $max_date, $format) > 0): return array(false, $error_late.$max_date.'.');
            case ($type === 'time' && !$this->regex($input, $regex)): return array(false, $error_time);
            case ($type === 'text' && !is_string($input)): return array(false, $error_text);
            case ($type === 'text' && $min && strlen($input) < $min): return array(false, $error_min_char);
            case ($type === 'text' && $max && strlen($input) > $max): return array(false, $error_max_char);
            default: return array(true, filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
        }
    }
}
