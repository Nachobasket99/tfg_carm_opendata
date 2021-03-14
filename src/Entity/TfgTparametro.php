<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TfgTparametro
 *
 * @ORM\Table(name="tfg_tparametro")
 * @ORM\Entity
 */
class TfgTparametro
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"comment"="Clave primaria"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="COD_PARAMETRO", type="string", length=5, nullable=false, options={"comment"="Código identificativo del parámetro (5 caracteres)"})
     */
    private $codParametro;

    /**
     * @var string
     *
     * @ORM\Column(name="DES_PARAMETRO", type="string", length=200, nullable=false, options={"comment"="Descripción del parámetro"})
     */
    private $desParametro;

    /**
     * @var string
     *
     * @ORM\Column(name="VAL_PARAMETRO", type="string", length=200, nullable=false, options={"comment"="Valor del parámetro (cadena de caracteres)"})
     */
    private $valParametro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodParametro(): ?string
    {
        return $this->codParametro;
    }

    public function setCodParametro(string $codParametro): self
    {
        $this->codParametro = $codParametro;

        return $this;
    }

    public function getDesParametro(): ?string
    {
        return $this->desParametro;
    }

    public function setDesParametro(string $desParametro): self
    {
        $this->desParametro = $desParametro;

        return $this;
    }

    public function getValParametro(): ?string
    {
        return $this->valParametro;
    }

    public function setValParametro(string $valParametro): self
    {
        $this->valParametro = $valParametro;

        return $this;
    }


}
