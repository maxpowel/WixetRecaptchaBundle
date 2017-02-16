<?php

namespace Wixet\RecaptchaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Wixet\RecaptchaBundle\Form\Type\WixetRecaptchaType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {

        $form = $this->createFormBuilder()
            ->setAction("http://localhost:8000/")
            ->add("nombre", TextType::class)
            ->add("recaptcha", WixetRecaptchaType::class)
            ->add("enviar", SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()) {
            echo "VALIDO";
        }
        return $this->render('WixetRecaptchaBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
