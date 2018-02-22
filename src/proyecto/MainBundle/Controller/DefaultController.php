<?php

namespace proyecto\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('proyecto_paciente'));
        
    }
    
    public function pacienteAction()
    {
        return $this->render('proyectoMainBundle:Default:paciente.html.twig');
    }
}
