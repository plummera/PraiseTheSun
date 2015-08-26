<?php

namespace PraiseItBundle\Controller\Altar;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PraiseItBundle\Entity\Prayer;
use PraiseItBundle\Form\PrayerType;

/**
 * Altar\Prayer controller.
 *
 * @Route("/pray")
 */
class PrayerController extends Controller
{

    /**
     * Lists all Altar\Prayer entities.
     *
     * @Route("/", name="pray")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PraiseItBundle:Prayer')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Altar\Prayer entity.
     *
     * @Route("/", name="pray_create")
     * @Method("POST")
     * @Template("PraiseItBundle:Altar\Prayer:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Prayer();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pray_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Altar\Prayer entity.
     *
     * @param Prayer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prayer $entity)
    {
        $form = $this->createForm(new PrayerType(), $entity, array(
            'action' => $this->generateUrl('pray_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Altar\Prayer entity.
     *
     * @Route("/new", name="pray_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Prayer();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Altar\Prayer entity.
     *
     * @Route("/{id}", name="pray_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PraiseItBundle:Altar\Prayer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Altar\Prayer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Altar\Prayer entity.
     *
     * @Route("/{id}/edit", name="pray_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PraiseItBundle:Altar\Prayer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Altar\Prayer entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Altar\Prayer entity.
    *
    * @param Prayer $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Prayer $entity)
    {
        $form = $this->createForm(new PrayerType(), $entity, array(
            'action' => $this->generateUrl('pray_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Altar\Prayer entity.
     *
     * @Route("/{id}", name="pray_update")
     * @Method("PUT")
     * @Template("PraiseItBundle:Altar\Prayer:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PraiseItBundle:Altar\Prayer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Altar\Prayer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pray_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Altar\Prayer entity.
     *
     * @Route("/{id}", name="pray_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PraiseItBundle:Altar\Prayer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Altar\Prayer entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pray'));
    }

    /**
     * Creates a form to delete a Altar\Prayer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pray_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
