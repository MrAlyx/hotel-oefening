<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, inversedBy="bill", cascade={"persist", "remove"})
     */
    private $Reservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $BillDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservation(): ?Reservation
    {
        return $this->Reservation;
    }

    public function setReservation(?Reservation $Reservation): self
    {
        $this->Reservation = $Reservation;

        return $this;
    }

    public function getBillDate(): ?\DateTimeInterface
    {
        return $this->BillDate;
    }

    public function setBillDate(\DateTimeInterface $BillDate): self
    {
        $this->BillDate = $BillDate;

        return $this;
    }
}
