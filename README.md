WixetRecaptchaBundle
====================

[![Build Status](https://travis-ci.org/maxpowel/WixetRecaptchaBundle.svg?branch=master)](https://travis-ci.org/maxpowel/WixetRecaptchaBundle)
[![Coverage Status](https://coveralls.io/repos/github/maxpowel/WixetRecaptchaBundle/badge.svg?branch=master)](https://coveralls.io/github/maxpowel/WixetRecaptchaBundle?branch=master)
[![License](https://poser.pugx.org/maxpowel/wixet-recaptcha-bundle/license)](https://packagist.org/packages/maxpowel/wixet-recaptcha-bundle)

Add google captcha valitation to symfony forms easily

## Installation

### Step 1: Use composer and enable Bundle

To install WixetRecaptchaBundle with Composer just type in your terminal:

```bash
composer require maxpowel/wixet-recaptcha-bundle
```

Now, Composer will automatically download all required files, and install them
for you. All that is left to do is to update your ``AppKernel.php`` file, and
register the new bundle:

```php
<?php

// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new Wixet\RecaptchaBundle\WixetRecaptchaBundle(),
    // ...
);
```
### Step2: Configure the bundle's

Add the following to your config file:

``` yaml
wixet_recaptcha:
     site_key: "YourSiteKey"
     secret: "YourSecret"
```
Get your recaptcha keys at [https://www.google.com/recaptcha/admin](https://www.google.com/recaptcha/admin)

## Basic Usage

In your controller or wherever is your form, add the WixetRecaptchaType like the following example:
```php

$form = $this->createFormBuilder()
            ->add("name", TextType::class)
            ->add("recaptcha", WixetRecaptchaType::class)
            ->add("Submit", SubmitType::class)
            ->getForm()
        ;

```

Don't forget to include the type
```php
use Wixet\RecaptchaBundle\Form\Type\WixetRecaptchaType;
```

Thats all!

