<?php

namespace Wixet\RecaptchaBundle\Validator\Constraint;
use Symfony\Component\Validator\Constraint;


/**
 * @Annotation
 */
class Recaptcha extends Constraint
{
    public $message = 'Captcha validation failed';


    
}