<?php

class AssocArrayFormatter
{
	const DELIMITER = '=>';

    public function format($string)
    {
    	if (empty($string) || ! strpos($string, "\n")) {
	    	return $string;
    	}

    	$lines = explode("\n", $string);

    	$needed_delimiter_position = static::determineMaxDelimiterPosition($lines);

    	foreach ($lines as &$line) {
    		$current_delimiter_position = strpos($line, static::DELIMITER);
    		if ($current_delimiter_position != $needed_delimiter_position) {
    			list($key, $value) = explode(static::DELIMITER, $line);
    			$key .= str_repeat(' ', $needed_delimiter_position - $current_delimiter_position);
    			$line = $key . static::DELIMITER . $value;
    		}
    	}


    	return implode("\n", $lines);
    }

    public static function determineMaxDelimiterPosition($lines, $delimiter = self::DELIMITER)
    {
    	$max = 0;

    	foreach ($lines as $line) {
    		$current = strpos($line, $delimiter);
    		if ($current > $max) {
    			$max = $current;
    		}
    	}

    	return $max;
    }
}
