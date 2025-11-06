<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use function App\Helpers\sanitize_name;

class HelpersTest extends TestCase
{
    public function test_sanitize_name_trims_and_normalizes()
    {
        $input = "  joHN   doE  ";
        $expected = "John Doe";
        $this->assertEquals($expected, sanitize_name($input));
    }

    public function test_sanitize_name_handles_multibyte_characters()
    {
        $input = " álVARo    Núñez ";
        $expected = "Álvaro Núñez";
        $this->assertEquals($expected, sanitize_name($input));
    }

    public function test_sanitize_name_single_word()
    {
        $input = "  mARiA ";
        $expected = "Maria";
        $this->assertEquals($expected, sanitize_name($input));
    }
}
