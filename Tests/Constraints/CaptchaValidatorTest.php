<?php

namespace Wixet\RecaptchaBundle\Validator\Tests\Constraints;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Wixet\RecaptchaBundle\Validator\Constraint\Recaptcha;
use Wixet\RecaptchaBundle\Validator\Constraint\RecaptchaValidator;

class CaptchaValidatorTest extends ConstraintValidatorTestCase
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
        $request = new Request(array(),array(), array("g-recaptcha-response" => "03AHJ_Vut8FEcdZwmTQSruHKvuFteiKjTIchjse8yO4U3ny85TzCrNy7KU8aFjaJYKbCkHRG0a3coAXUbgXrYWiDaliqINEfyCyqoDxSPUThbQXl-xXi6bCzgPyACza_333R5njC9iA7X_1AQIUqRMTM4Kf6hKr3u7yb5CiR6SoqZWXpVyNyvX7yvinIeB9v-BDTdCkk8w4HO4xKy5egnMg65hL3A5Fx7V6bXUJT07QxxY-LSm90cSA5RvwBJaap31xxQkC7hCBb7dBJw5-yRtmWfBhHl-F-MbKjieJmnXfZw9RFJbvujIRiuNxgpKAEe-27NbDHJlQHOh3oVBaokf1LSixGk2bI8KYTMdnbZoWcb2So8X9eVGs3m4oeyihPgpkoR4SkpHPsVWwJRcoUm05NqrXoOS7ivW2w"));
        $requestStack->push($request);
        return new RecaptchaValidator($requestStack, $this->testSecret);
    }

    public function testCaptchaIsValid() {
        $this->validator->validate(null, new Recaptcha());
        $this->assertNoViolation();
    }


}