<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="reservations")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity=Guest::class, inversedBy="reservations")
     */
    private $Guest;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CheckInDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CheckOutDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $CheckedIn;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $CheckedOut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ReservationDate;

    /**
     * @ORM\OneToOne(targetEntity=Bill::class, mappedBy="Reservation", cascade={"persist", "remove"})
     */
    private $bill;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getGuest(): ?Guest
    {
        return $this->Guest;
    }

    public function setGuest(?Guest $Guest): self
    {
        $this->Guest = $Guest;

        return $this;
    }

    public function getCheckInDate(): ?\DateTimeInterface
    {
        return $this->CheckInDate;
    }

    public function setCheckInDate(\DateTimeInterface $CheckInDate): self
    {
        $this->CheckInDate = $CheckInDate;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->CheckOutDate;
    }

    public function setCheckOutDate(\DateTimeInterface $CheckOutDate): self
    {
        $this->CheckOutDate = $CheckOutDate;

        return $this;
    }

    public function getCheckedIn(): ?bool
    {
        return $this->CheckedIn;
    }

    public function setCheckedIn(?bool $CheckedIn): self
    {
        $this->CheckedIn = $CheckedIn;

        return $this;
    }

    public function getCheckedOut(): ?bool
    {
        return $this->CheckedOut;
    }

    public function setCheckedOut(?bool $CheckedOut): self
    {
        $this->CheckedOut = $CheckedOut;

        return $this;
    }

    public function getReservationDate(): ?\DateTimeInterface
    {
        return $this->ReservationDate;
    }

    public function setReservationDate(\DateTimeInterface $ReservationDate): self
    {
        $this->ReservationDate = $ReservationDate;

        return $this;
    }

    public function getBill(): ?Bill
    {
        return $this->bill;
    }

    public function setBill(?Bill $bill): self
    {
        // unset the owning side of the relation if necessary
        if ($bill === null && $this->bill !== null) {
            $this->bill->setReservation(null);
        }

        // set the owning side of the relation if necessary
        if ($bill !== null && $bill->getReservation() !== $this) {
            $bill->setReservation($this);
        }

        $this->bill = $bill;

        return $this;
    }
}
