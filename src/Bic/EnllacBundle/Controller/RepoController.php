<?php

namespace Bic\EnllacBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bic\EnllacBundle\Entity\Repo;
use Bic\EnllacBundle\Form\RepoType;

/**
 * Repo controller.
 *
 * @Route("/repo")
 */
class RepoController extends Controller
{
    /**
     * Lists all Repo entities.
     *
     * @Route("/", name="repo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BicEnllacBundle:Repo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Repo entity.
     *
     * @Route("/", name="repo_create")
     * @Method("POST")
     * @Template("BicEnllacBundle:Repo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Repo();
        $form = $this->createForm(new RepoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('repo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Repo entity.
     *
     * @Route("/new", name="repo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Repo();
        $form   = $this->createForm(new RepoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Repo entity.
     *
     * @Route("/{id}", name="repo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BicEnllacBundle:Repo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Repo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Repo entity.
     *
     * @Route("/{id}/edit", name="repo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BicEnllacBundle:Repo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Repo entity.');
        }

        $editForm = $this->createForm(new RepoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Repo entity.
     *
     * @Route("/{id}", name="repo_update")
     * @Method("PUT")
     * @Template("BicEnllacBundle:Repo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BicEnllacBundle:Repo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Repo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RepoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('repo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Repo entity.
     *
     * @Route("/{id}", name="repo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BicEnllacBundle:Repo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Repo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('repo'));
    }

    /**
     * Creates a form to delete a Repo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
