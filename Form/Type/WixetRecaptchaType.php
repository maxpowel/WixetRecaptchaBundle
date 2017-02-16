<?php

namespace Wixet\RecaptchaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Wixet\RecaptchaBundle\Validator\Constraint\Recaptcha;
use Wixet\RecaptchaBundle\Validator\Constraint\RecaptchaValidator;


class WixetRecaptchaType extends AbstractType
{

    /**
     * Site key provided by google. It is the public token that you place in your web
     */
    private $siteKey;

    public function __construct($siteKey)
    {
        $this->siteKey = $siteKey;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'constraints' => array(new Recaptcha())
        ));
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['site_key'] = $this->siteKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TextType::class;
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wixet_recaptcha';
    }
}