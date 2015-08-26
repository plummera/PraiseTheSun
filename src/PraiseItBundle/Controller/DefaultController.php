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

class DefaultController extends Controller
{

    /**
     * @Route("/", name="Altar_of_The_Sun")
     * @Template("PraiseItBundle:Default:welcome.html.twig")
     */
    public function indexAction()
    {
      $authSecurity = $this->get('security.context');
      $user = $authSecurity->getToken()->getUser();
      $em = $this->getDoctrine()->getManager();

      // if user is unregistered, redirect them to another page
      if( $user ) {

          $paladins = $em->getRepository('PraiseItBundle:Prayer')->findById($user);
          $paladin = '';
          foreach ($paladins as $p) {
            $paladin = $p;
          }

          if( $paladin ) {

            $paladin_profile_status = $this->paladinProfileStatus( $paladin );

            if( $paladin_profile_status == 0 ) {

                $this->get('session')->getFlashBag()->add(
                  'notice',
                  'Welcome! Please complete your profile first.'
                  );

                return $this->redirect($this->generateUrl('paladinprofile_view'));

            }
            elseif( $paladin_profile_status == 2 ) {

              $this->get('session')->getFlashBag()->add(
                'notice',
                'Welcome! Please see the whatever this will be at the bottom of the form.' .
                'You will not be permitted to access the rest of the site until you select "Yes".'
                );

              return $this->redirect($this->generateUrl('paladinprofile_view'));

            }

          } else if ($authSecurity->isGranted('ROLE_ADMIN')) {
              return $this->redirect($this->generateUrl('prayer_list'));
          } else if ($authSecurity->isGranted('ROLE_PALADIN')) {
              return $this->redirect($this->generateUrl('signup'));
          } else {
            return $this->render('PraiseItBundle:Default:welcome.html.twig');
          }

        }



    return array(
      'paladin' => $paladin
    );

  }

  /**
     * Check if the user has filled out their profile.
     */
    private function paladinProfileStatus($paladin)
    {

        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $paladin_profile = '';
        $paladin_profiles = $em->getRepository('PraiseItBundle:Prayer')->findById($user);

        foreach ($paladin_profiles as $pp) {
           $paladin_profile = $pp;
       }

       if( !$paladin_profile ) {
                return 0; // student has not filled out profile
            }

            if( $paladin->getId() == 'Year 2' && $paladin->getName() == 'CMHS (day program)' ) {
              if( $paladin_profile->getY2CmhsCommitmentStatement() != 1 ) {
                return 2; // Y2 CMHS Student has not committed
            }
        }

        return 1; // student profile looks good
      }
}
