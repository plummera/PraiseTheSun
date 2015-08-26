<?php

namespace PraiseItBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PraiseItBundle\Entity\Prayer;
use PraiseItBundle\Form\PrayerType;
use PraiseItBundle\Controller\Altar;

class LoginController extends Controller
{
    /**
     * @Route("/", name="Altar_of_The_Sun")
     *
     *
     */
    public function indexAction()
    {
        $helper = $this->get('security.authentication_utils');

        return $this->render('PraiseItBundle:Default:welcome.html.twig', array(
            'last_username' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError(),
        ));
    }

}
