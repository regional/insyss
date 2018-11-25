<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * usuario_campos_afines
 *
 * @ORM\Table(name="usuario_campos_afines")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\usuario_campos_afinesRepository")
 */
class usuario_campos_afines
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_id", type="string", length=255)
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="campo_afin_id", type="string", length=255)
     */
    private $campoAfinId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuarioId
     *
     * @param string $usuarioId
     *
     * @return usuario_campos_afines
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return string
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set campoAfinId
     *
     * @param string $campoAfinId
     *
     * @return usuario_campos_afines
     */
    public function setCampoAfinId($campoAfinId)
    {
        $this->campoAfinId = $campoAfinId;

        return $this;
    }

    /**
     * Get campoAfinId
     *
     * @return string
     */
    public function getCampoAfinId()
    {
        return $this->campoAfinId;
    }
}

