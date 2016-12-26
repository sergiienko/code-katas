<?php

namespace spec;

use PrimeFactors;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeFactorsSpec extends ObjectBehavior
{
	function it_calculates_that_1_does_not_have_prime_factors()
	{
		$this->generate(1)->shouldReturn([]);
	}

	function it_computes_prime_factors_of_2()
	{
		$this->generate(2)->shouldReturn([2]);
	}

	function it_computes_prime_factors_of_3()
	{
		$this->generate(3)->shouldReturn([3]);
	}

	function it_computes_prime_factors_of_4()
	{
		$this->generate(4)->shouldReturn([2, 2]);
	}

	function it_computes_prime_factors_of_5()
	{
		$this->generate(5)->shouldReturn([5]);
	}

	function it_computes_prime_factors_of_6()
	{
		$this->generate(6)->shouldReturn([2, 3]);
	}

    function it_computes_prime_factors_of_7()
    {
        $this->generate(7)->shouldReturn([7]);
    }

	function it_computes_prime_factors_of_8()
	{
		$this->generate(8)->shouldReturn([2, 2, 2]);
	}

	function it_computes_prime_factors_of_9()
	{
		$this->generate(9)->shouldReturn([3, 3]);
	}

    function it_computes_prime_factors_of_26()
    {
        $this->generate(26)->shouldReturn([2, 13]);
    }

	function it_computes_prime_factors_of_100()
	{
		$this->generate(100)->shouldReturn([2, 2, 5, 5]);
	}
}
