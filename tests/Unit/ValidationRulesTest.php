<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ValidationRulesTest extends TestCase
{
    public function test_email_validation_rule_accepts_valid_email()
    {
        $data = ['email' => 'user@example.com'];
        $rules = ['email' => 'required|email'];
        $validator = Validator::make($data, $rules);
        $this->assertFalse($validator->fails());
    }

    public function test_email_validation_rule_rejects_invalid_email()
    {
        $data = ['email' => 'not-an-email'];
        $rules = ['email' => 'required|email'];
        $validator = Validator::make($data, $rules);
        $this->assertTrue($validator->fails());
    }
}
