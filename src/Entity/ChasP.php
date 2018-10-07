<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChasPRepository")
 */
class ChasP
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	* @ORM\Column(type="integer")
	* @ORM\ManyToMany(targetEntity="Customer")
	* @ORM\JoinColumn(name="id_customer", referencedColumnName="id")
	*/
	private $id_customer;
	
	/**
	* @ORM\Column(type="integer")
	* @ORM\ManyToMany(targetEntity="MedicalPackage")
	* @ORM\JoinColumn(name="id_med_package", referencedColumnName="id")
	*/
	private $id_med_package;
	
	/**
	* @ORM\Column(type="date")
	*/
	private $date_start;
	
	/**
	* @ORM\Column(type="date")
	*/
	private $date_end;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCustomer(): ?int
    {
        return $this->id_customer;
    }

    public function setIdCustomer(int $id_customer): self
    {
        $this->id_customer = $id_customer;

        return $this;
    }

    public function getIdMedPackage(): ?int
    {
        return $this->id_med_package;
    }

    public function setIdMedPackage(int $id_med_package): self
    {
        $this->id_med_package = $id_med_package;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }


}
