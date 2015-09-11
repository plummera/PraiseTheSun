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
     * @Route("/paladin", name="prayer_list")
     *
     *
     */
    public function AccessAction()
    {
        return $this->render('PraiseItBundle:Paladin:base.html.twig');
    }

}
