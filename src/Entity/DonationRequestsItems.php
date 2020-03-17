<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="danation_requests_items")
 */
final class DonationRequestsItems
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
     * @var DonationRequest|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\DonationRequest", inversedBy="donatedItems")
     * @ORM\JoinColumn(name="donation_request_id", nullable=false)
     */
    private $donationRequest;

    /**
     * @var DonationItem|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\DonationItem", inversedBy="donatedItems")
     * @ORM\JoinColumn(name="item_id", nullable=false)
     */
    private $item;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantity", type="integer", length=64)
     */
    private $quantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other", type="text")
     */
    private $other;

    /**
     * @return DonationRequest
     */
    public function getDonationRequest(): ?DonationRequest
    {
        return $this->donationRequest;
    }

    /**
     * @param DonationItem $donationRequest
     */
    public function setDonationRequest(DonationItem $donationRequest): void
    {
        $this->donationRequest = $donationRequest;
    }

    /**
     * @return DonationItem
     */
    public function getItem(): ?DonationItem
    {
        return $this->item;
    }

    /**
     * @param DonationItem $item
     */
    public function setItem(DonationItem $item): void
    {
        $this->item = $item;
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return string|null
     */
    public function getOther(): ?string
    {
        return $this->other;
    }

    /**
     * @param string|null $other
     */
    public function setOther(?string $other): void
    {
        $this->other = $other;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s (%s) pcs', $this->item->getName(), $this->getQuantity());
    }
}
