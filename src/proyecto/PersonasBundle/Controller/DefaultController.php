<?php

namespace proyecto\PersonasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    { 
       
        return $this->render('proyectoPersonasBundle:Default:index.html.twig');
    }
    
     public function datosPacienteAction()
    { 
        return $this->render('proyectoPersonasBundle:Default:datosPaciente.html.twig');
    } 

     public function datosTratamientoAction()
    { 
        
        return $this->render('proyectoPersonasBundle:Default:datosTratamiento.html.twig'); 
    }
     public function datosFichaPreparadoAction()
    { 
        
        return $this->render('proyectoPersonasBundle:Default:datosFichaPreparado.html.twig');    
    }   

    
}

