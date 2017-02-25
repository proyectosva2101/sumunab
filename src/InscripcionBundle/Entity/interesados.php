<?php

namespace InscripcionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * interesados
 *
 * @ORM\Table(name="tbl_interesados")
 * @ORM\Entity(repositoryClass="InscripcionBundle\Repository\interesadosRepository")
 */
class interesados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_inte", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="inte_nombres", type="string", length=80)
     */
    private $inteNombres;

    /**
     * @var string
     *
     * @ORM\Column(name="inte_apellidos", type="string", length=80)
     */
    private $inteApellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="inte_correo", type="string", length=50)
     */
    private $inteCorreo;

    /**
     * @var string
     *
     * @ORM\Column(name="inte_tipo", type="string", length=20)
     */
    private $inteTipo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set inteNombres
     *
     * @param string $inteNombres
     * @return interesados
     */
    public function setInteNombres($inteNombres)
    {
        $this->inteNombres = $inteNombres;

        return $this;
    }

    /**
     * Get inteNombres
     *
     * @return string 
     */
    public function getInteNombres()
    {
        return $this->inteNombres;
    }

    /**
     * Set inteApellidos
     *
     * @param string $inteApellidos
     * @return interesados
     */
    public function setInteApellidos($inteApellidos)
    {
        $this->inteApellidos = $inteApellidos;

        return $this;
    }

    /**
     * Get inteApellidos
     *
     * @return string 
     */
    public function getInteApellidos()
    {
        return $this->inteApellidos;
    }

    /**
     * Set inteCorreo
     *
     * @param string $inteCorreo
     * @return interesados
     */
    public function setInteCorreo($inteCorreo)
    {
        $this->inteCorreo = $inteCorreo;

        return $this;
    }

    /**
     * Get inteCorreo
     *
     * @return string 
     */
    public function getInteCorreo()
    {
        return $this->inteCorreo;
    }

    /**
     * Set inteTipo
     *
     * @param string $inteTipo
     * @return interesados
     */
    public function setInteTipo($inteTipo)
    {
        $this->inteTipo = $inteTipo;

        return $this;
    }

    /**
     * Get inteTipo
     *
     * @return string 
     */
    public function getInteTipo()
    {
        return $this->inteTipo;
    }
}
