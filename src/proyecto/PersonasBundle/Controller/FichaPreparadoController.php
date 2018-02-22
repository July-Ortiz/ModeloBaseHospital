<?php

namespace proyecto\PersonasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use proyecto\PersonasBundle\Entity\FichaPreparado;
use proyecto\PersonasBundle\Form\FichaPreparadoType;

/**
 * FichaPreparado controller.
 *
 */
class FichaPreparadoController extends Controller
{

    /**
     * Lists all FichaPreparado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('proyectoPersonasBundle:FichaPreparado')->findAll();

        return $this->render('proyectoPersonasBundle:FichaPreparado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new FichaPreparado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FichaPreparado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyecto_ficha_preparado_show', array('id' => $entity->getId())));
        }

        return $this->render('proyectoPersonasBundle:FichaPreparado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FichaPreparado entity.
     *
     * @param FichaPreparado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FichaPreparado $entity)
    {
        $form = $this->createForm(new FichaPreparadoType(), $entity, array(
            'action' => $this->generateUrl('proyecto_ficha_preparado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Nuevo'));

        return $form;
    }

    /**
     * Displays a form to create a new FichaPreparado entity.
     *
     */
    public function newAction()
    {
        $entity = new FichaPreparado();
        $form   = $this->createCreateForm($entity);

        return $this->render('proyectoPersonasBundle:FichaPreparado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FichaPreparado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:FichaPreparado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FichaPreparado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('proyectoPersonasBundle:FichaPreparado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FichaPreparado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:FichaPreparado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FichaPreparado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('proyectoPersonasBundle:FichaPreparado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FichaPreparado entity.
    *
    * @param FichaPreparado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FichaPreparado $entity)
    {
        $form = $this->createForm(new FichaPreparadoType(), $entity, array(
            'action' => $this->generateUrl('proyecto_ficha_preparado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing FichaPreparado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('proyectoPersonasBundle:FichaPreparado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FichaPreparado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyecto_ficha_preparado_edit', array('id' => $id)));
        }

        return $this->render('proyectoPersonasBundle:FichaPreparado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FichaPreparado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('proyectoPersonasBundle:FichaPreparado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FichaPreparado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proyecto_ficha_preparado'));
    }

    /**
     * Creates a form to delete a FichaPreparado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyecto_ficha_preparado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
