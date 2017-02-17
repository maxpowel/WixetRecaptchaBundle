WixetRecaptchaBundle
====================

[![Build Status](https://travis-ci.org/maxpowel/WixetRecaptchaBundle.svg?branch=master)](https://travis-ci.org/maxpowel/WixetRecaptchaBundle)
[![Coverage Status](https://coveralls.io/repos/github/maxpowel/WixetRecaptchaBundle/badge.svg?branch=master)](https://coveralls.io/github/maxpowel/WixetRecaptchaBundle?branch=master)
[![License](https://poser.pugx.org/maxpowel/wixet-recaptcha-bundle/license)](https://packagist.org/packages/maxpowel/wixet-recaptcha-bundle)

Add google captcha validation to symfony forms easily

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

## Multiple and delayed render
Sometimes you need multiple recaptchas or delayed render (not render onload but render when you want).
This is useful for example when you load ajax content with recaptchas.

The first step is include the recaptcha script manually (where you load all your scripts), you have to options:

```twig
{{ include_recaptcha() | raw }}
```
or

```twig
{{ include('WixetRecaptchaBundle::recaptcha_explicit.html.twig', { 'site_key': recaptcha_site_key() }) }}
```

I prefer the first way but the second allows more customization.

Now render the form as usual with the option "explicitRender=true"

```php

$form = $this->createFormBuilder()
            ->add("name", TextType::class)
            ->add("recaptcha", WixetRecaptchaType::class, array(
                'explicit_render' => true
            ))
            ->add("Submit", SubmitType::class)
            ->getForm()
        ;

```


That's all!

