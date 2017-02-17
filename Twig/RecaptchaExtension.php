<?php


namespace Wixet\RecaptchaBundle\Twig;

class RecaptchaExtension extends \Twig_Extension
{
    private $siteKey;
    private $twig;

    public function __construct($siteKey,\Twig_Environment $twig)
    {
        $this->siteKey = $siteKey;
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('recaptcha_site_key', array($this, 'getSiteKey')),
            new \Twig_SimpleFunction('include_recaptcha', array($this, 'getIncludeRecaptcha'))
        );
    }

    public function getSiteKey()
    {

        return $this->siteKey;
    }

    public function getIncludeRecaptcha() {
        return $this->twig->render('WixetRecaptchaBundle::recaptcha_explicit.html.twig', array("site_key" => $this->siteKey));
    }

    public function getName()
    {
        return 'wixet_recaptcha_extension';
    }
}