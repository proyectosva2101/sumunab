<?php

namespace InscripcionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use InscripcionBundle\Entity\interesados;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Interesado controller.
 *
 * @Route("")
 */
class InteresadoController extends Controller {

    /**
     * @Route("/", name="homepage2")
     * @Method("GET")
     */
    public function indexAction() {
        return $this->render('InscripcionBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/login", name="iniciar_sesion")
     * @Method("POST")
     */
    public function iniciarSesionAction(Request $request) {
        $usuario = $request->request->get('idusuario');
        $contrasenia = $request->request->get('idcontrasenia');
        
//        var_dump($usuario);
//        var_dump($contrasenia);
//        exit;
        return $this->render('InscripcionBundle:Interesados:interesado.html.twig');
        //return $this->render('InscripcionBundle:Interesados:interesado.html.twig', array('listaComplejos' => $listaComplejos));
    }
    
    public function inicioAction() {
        return $this->render('InscripcionBundle:Interesados:interesado.html.twig');
    }
    
    public function historialAction() {
        return $this->render('InscripcionBundle:Interesados:historial.html.twig');
    }
    
    public function programacionAction() {
        return $this->render('InscripcionBundle:Interesados:programacion.html.twig');
    }
    
    public function reportepreAction() {
        return $this->render('InscripcionBundle:Interesados:reportepre.html.twig');
    }
    
    public function reporteAction() {
        return $this->render('InscripcionBundle:Interesados:reporte.html.twig');
    }
    

    
    //...........................................................................................................//
    public function nuevoAction() {
        return $this->render('InscripcionBundle:Interesados:interesado.html.twig');
    }

    public function addAction(Request $request) {

        $intenombres = $request->request->get('nombres');
        $inteapellidos = $request->request->get('apellidos');
        $intecorreo = $request->request->get('correo');

        if ($request->getMethod() == "POST") {
            $int = new interesados();
            $int->setInteNombres($intenombres);
            $int->setInteApellidos($inteapellidos);
            $int->setInteCorreo($intecorreo);
            $int->setInteTipo('interesado');
            $em = $this->getDoctrine()->getManager();
            $em->persist($int);
            $em->flush();

            $this->addFlash('Mensaje', 'Se registro Correctamente');
            $form = 0;
            return $this->redirectToRoute('inscripcion_interesado_lista');
        } else {
            return $this->redirectToRoute('inscripcion_interesado_nuevo');
        }
    }

    public function listaAction() {
        $em = $this->getDoctrine()->getManager();

        $lists = $em
                ->getRepository('InscripcionBundle:interesados')
                ->ListaInteresados();

        $this->get('session')->set('listInte', $lists);

        return $this->render('InscripcionBundle:Interesados:list_interesado.html.twig');
    }

    public function editarAction($id) {
        $em = $this->getDoctrine()->getManager(); //conectado a ORM
        $cat = $em
                ->getRepository('InscripcionBundle:interesados')
                ->find($id);
        return $this->render('InscripcionBundle:Interesados:editar.html.twig', array('datosEdit' => $cat));
    }

    public function updateAction(Request $request) {

        $idinte = $request->request->get('idinte');
        $nombresinte = $request->request->get('nombresinte');
        $apellidosinte = $request->request->get('apellidosinte');
        $correointe = $request->request->get('correointe');

        $em = $this->getDoctrine()->getManager();
        $int = $em->getRepository('InscripcionBundle:interesados')->find($idinte);

        if (!$int) {
            $this->addFlash('MensajeError', 'No se pudo Actualizar');
            return $this->redirectToRoute('inscripcion_interesado_lista');
        } else {
            if ($request->getMethod() == "POST") {
                $int->setinteNombres($nombresinte);
                $int->setinteApellidos($apellidosinte);
                $int->inteCorreo($correointe);
                $em->flush();
                $this->addFlash('Mensaje', 'Se Actualizo Correctamente');
                return $this->redirectToRoute('inscripcion_interesado_lista');
            } else {
                $this->addFlash('MensajeError', 'No se pudo Actualizar');
                return $this->redirectToRoute('inscripcion_interesado_lista');
            }
        }
    }

}
