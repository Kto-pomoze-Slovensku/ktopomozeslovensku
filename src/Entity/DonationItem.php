<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonationItemRepository")
 * @ORM\Table(name="donation_item")
 */
/* final */class DonationItem
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
     * @var string|null
     *
     * @ORM\Column(type="string", length=255, name="value", unique=true)
     */
    private $name;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DonationRequestsItems", mappedBy="item")
     */
    private $donatedItems;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\HelpRequestsItems", mappedBy="item")
     */
    private $requestedItems;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Donation", mappedBy="donationItem")
     */
    private $donations;

    /**
     * @var DonationItemGroup|null

     * @ORM\ManyToOne(targetEntity="App\Entity\DonationItemGroup", inversedBy="items")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     */
    private $group;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", name="`show`")
     */
    private $show = true;

    /**
     *
     */
    public function __construct()
    {
        $this->donatedItems = new ArrayCollection();
        $this->requestedItems = new ArrayCollection();
        $this->donations = new ArrayCollection();
    }

    /**
     * @param DonationItemGroup $group
     */
    public function setGroup(DonationItemGroup $group): void
    {
        $this->group = $group;
    }

    /**
     * @return DonationItemGroup
     */
    public function getGroup(): ?DonationItemGroup
    {
        return $this->group;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName() ?? '';
    }

    /**
     * @return Collection
     */
    public function getDonations(): Collection
    {
        return $this->donations;
    }

    /**
     * @return Collection
     */
    public function getDonatedItems(): Collection
    {
        return $this->donatedItems;
    }

    /**
     * @return Collection
     */
    public function getRequestedItems(): Collection
    {
        return $this->requestedItems;
    }

    /**
     * @return bool
     */
    public function isShow(): bool
    {
        return $this->show;
    }

    /**
     * @param bool $show
     *
     * @return void
     */
    public function setShow(bool $show): void
    {
        $this->show = $show;
    }
}
