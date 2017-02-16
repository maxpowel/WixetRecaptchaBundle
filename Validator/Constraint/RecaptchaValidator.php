<?php

namespace Wixet\RecaptchaBundle\Validator\Constraint;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class RecaptchaValidator extends ConstraintValidator
{
    private $request;
    private $secret;

    public function __construct(RequestStack $request, $secret)
    {
        $this->request = $request;
        $this->secret = $secret;
    }

    public function validate($value, Constraint $constraint)
    {
        $request = $this->request->getMasterRequest();


        $captchaResponse = $request->get("g-recaptcha-response");
        $remoteIp = $request->getClientIp();

        $parameters = array(
            "secret" => $this->secret,
            "response" => $captchaResponse,
            "remoteip" => $remoteIp
        );

        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");

        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        if(!$result->success){
            $this->context->addViolation($constraint->message);
        }

    }
}