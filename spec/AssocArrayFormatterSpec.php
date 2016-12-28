<?php

namespace spec;

use AssocArrayFormatter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssocArrayFormatterSpec extends ObjectBehavior
{
	function it_does_not_format_an_empty_string()
	{
		$this->format('')->shouldReturn('');
	}

	function it_does_not_format_one_line_string()
	{
		$string = "'foo' => 'bar'";
		$this->format($string)->shouldReturn($string);
	}

	function it_formats_an_associative_array()
	{
		$input = <<<INPUT
			1000 => 'M', 
			900 => 'CM',
			500 => 'D',
			400 => 'CD',
			100 => 'C',
			90 => 'XC',
			50 => 'L',
			40 => 'XL',
			10 => 'X',
			9 => 'IX',
			5 => 'V',
			4 => 'IV',
			1 => 'I',
INPUT;

		$output = <<<OUTPUT
			1000 => 'M', 
			900  => 'CM',
			500  => 'D',
			400  => 'CD',
			100  => 'C',
			90   => 'XC',
			50   => 'L',
			40   => 'XL',
			10   => 'X',
			9    => 'IX',
			5    => 'V',
			4    => 'IV',
			1    => 'I',
OUTPUT;

		$this->format($input)->shouldReturn($output);
	}
}
