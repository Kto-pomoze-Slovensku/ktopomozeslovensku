<?php
declare(strict_types=1);
/*
 * @author pbrecska <pbrecska@pixelfederation.com>
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="recipient_group")
 */
/* final */class RecipientGroup
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Recipient", mappedBy="recipientGroup", cascade={"persist","remove"})
     */
    private $recipients;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\HelpRequest", mappedBy="recipientGroup", cascade={"persist","remove"})
     */
    private $helpRequests;

    /**
     * @var string
     * @ORM\Column(type="string", length=250, name="name")
     */
    private $name = '';

    /**
     * @var string
     * @ORM\Column(type="string", length=3, name="abbreviation", nullable=true)
     */
    private $abbreviation;

    /**
     */
    public function __construct()
    {
        $this->recipients = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getRecipients(): Collection
    {
        return $this->recipients;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Collection $recipients
     *
     * @return void
     */
    public function setRecipients(Collection $recipients): void
    {
        $this->recipients = $recipients;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getHelpRequests(): Collection
    {
        return $this->helpRequests;
    }

    /**
     * @param Collection $helpRequests
     *
     * @return void
     */
    public function setHelpRequests(Collection $helpRequests): void
    {
        $this->helpRequests = $helpRequests;
    }

    /**
     * @return string
     */
    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     */
    public function setAbbreviation(?string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }
}
