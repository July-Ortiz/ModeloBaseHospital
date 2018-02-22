<?php

namespace proyecto\PersonasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use proyecto\PersonasBundle\Entity\tratamiento;
use proyecto\PersonasBundle\Form\tratamientoType;

/**
 * tratamiento controller.
 *
 */
class tratamientoController extends Controller
{

    /**
     * Lists all tratamiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('proyectoPersonasBundle:tratamiento')->findAll();

        return $this->render('proyectoPersonasBundle:tratamiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new tratamiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new tratamiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyecto_tratamiento_show', array('id' => $entity->getId())));
        }

        return $this->render('proyectoPersonasBundle:tratamiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a tratamiento entity.
     *
     * @param tratamiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(tratamiento $entity)
    {
        $form = $this->createForm(new tratamientoType(), $entity, array(
            'action' => $this->generateUrl('proyecto_tratamiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Nuevo'));

        return $form;
    }

    /**
     * Displays a form to create a new tratamiento entity.
     *
     */
    public function newAction()
    {
        $entity = new tratamiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('proyectoPersonasBundle:tratamiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tratamiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:tratamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tratamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('proyectoPersonasBundle:tratamiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tratamiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:tratamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tratamiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('proyectoPersonasBundle:tratamiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a tratamiento entity.
    *
    * @param tratamiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(tratamiento $entity)
    {
        $form = $this->createForm(new tratamientoType(), $entity, array(
            'action' => $this->generateUrl('proyecto_tratamiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing tratamiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:tratamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tratamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyecto_tratamiento_edit', array('id' => $id)));
        }

        return $this->render('proyectoPersonasBundle:tratamiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a tratamiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('proyectoPersonasBundle:tratamiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find tratamiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proyecto_tratamiento'));
    }

    /**
     * Creates a form to delete a tratamiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyecto_tratamiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
