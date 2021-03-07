<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $RoomNumber;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Is_Available;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $RoomPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxGuest;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="room")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNumber(): ?int
    {
        return $this->RoomNumber;
    }

    public function setRoomNumber(int $RoomNumber): self
    {
        $this->RoomNumber = $RoomNumber;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->Is_Available;
    }

    public function setIsAvailable(bool $Is_Available): self
    {
        $this->Is_Available = $Is_Available;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getRoomPrice(): ?float
    {
        return $this->RoomPrice;
    }

    public function setRoomPrice(float $RoomPrice): self
    {
        $this->RoomPrice = $RoomPrice;

        return $this;
    }

    public function getMaxGuest(): ?int
    {
        return $this->MaxGuest;
    }

    public function setMaxGuest(int $MaxGuest): self
    {
        $this->MaxGuest = $MaxGuest;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoom() === $this) {
                $reservation->setRoom(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->getId();
    }
}
