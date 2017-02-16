<?php

namespace Wixet\RecaptchaBundle\Validator\Tests\Constraints;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Wixet\RecaptchaBundle\Validator\Constraint\Recaptcha;
use Wixet\RecaptchaBundle\Validator\Constraint\RecaptchaValidator;


class InvalidCaptchaValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * Test recaptcha tokens
     * https://developers.google.com/recaptcha/docs/faq#id-like-to-run-automated-tests-with-recaptcha-v2-what-should-i-do
     */
    private $testSecret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
    private $testSiteKey = "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI";

    protected function createValidator()
    {
        $requestStack = new RequestStack();
        $request = new Request(array(),array(), array("g-recaptcha-response" => "NOPE"));
        $requestStack->push($request);
        return new RecaptchaValidator($requestStack, $this->testSecret);
    }

    public function testInvalidCaptcha() {
        $this->validator->validate(null, new Recaptcha());
        $this->buildViolation('Captcha validation failed')->assertRaised();
    }

    public function testInvalidCaptcha2() {
        //TESTING TRAVIS
        $this->validator->validate(null, new Recaptcha());
        $this->assertNoViolation();
    }
    

}