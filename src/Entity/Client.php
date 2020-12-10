<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=ClientsProfile::class, mappedBy="client", cascade={"persist", "remove"})
     */
    private $clientsProfile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientsProfile(): ?ClientsProfile
    {
        return $this->clientsProfile;
    }

    public function setClientsProfile(?ClientsProfile $clientsProfile): self
    {
        // unset the owning side of the relation if necessary
        if ($clientsProfile === null && $this->clientsProfile !== null) {
            $this->clientsProfile->setClient(null);
        }

        // set the owning side of the relation if necessary
        if ($clientsProfile !== null && $clientsProfile->getClient() !== $this) {
            $clientsProfile->setClient($this);
        }

        $this->clientsProfile = $clientsProfile;

        return $this;
    }
}
