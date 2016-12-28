<?php

class AssocArrayFormatter
{
	const DELIMITER = '=>';

	private $lines = [];

	public function __construct($input)
	{
		$this->lines = explode("\n", $input);
	}

    public function format()
    {
    	if (empty($this->lines)) {
    		return '';
    	}

    	if (count($this->lines) == 1) {
	    	return $this->lines[0];
    	}

    	$needed_delimiter_position = static::determineMaxDelimiterPosition($this->lines);

    	foreach ($this->lines as &$line) {
    		$current_delimiter_position = strpos($line, static::DELIMITER);
    		if ($current_delimiter_position != $needed_delimiter_position) {
    			$line = static::addSpaces($line, $needed_delimiter_position - $current_delimiter_position);
    		}
    	}


    	return $this->__toString();
    }

    public function __toString()
    {
    	return implode("\n", $this->lines);
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

    public static function addSpaces($line, $number_of_spaces)
    {
		list($key, $value) = explode(static::DELIMITER, $line);
		$key .= str_repeat(' ', $number_of_spaces);
		return $key . static::DELIMITER . $value;
    }
}
