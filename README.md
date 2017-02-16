WixetRecaptchaBundle
====================

Add google captcha valitation to symfony forms easily

An example:
```php
use Wixet\RecaptchaBundle\Form\Type\WixetRecaptchaType;

$form = $this->createFormBuilder()
            ->add("name", TextType::class)
            ->add("recaptcha", WixetRecaptchaType::class)
            ->add("Submit", SubmitType::class)
            ->getForm()
        ;

```

Thats all!

[![Build Status](https://travis-ci.org/maxpowel/WixetRecaptchaBundle.svg?branch=master)](https://travis-ci.org/maxpowel/WixetRecaptchaBundle)