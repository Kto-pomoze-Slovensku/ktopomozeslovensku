<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Entity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="account_current_balance")
 * @ORM\HasLifecycleCallbacks()
 */
final class AccountCurrentBalance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(type="float", name="credit")
     */
    private $credit;

    /**
     * @var float
     *
     * @ORM\Column(type="float", name="credit")
     */
    private $debit;

    /**
     * @var int
     *
     *
     * @ORM\Column(type="int", name="credit_count")
     */
    private $creditcount;

    /**
     * @var int
     *
     * @ORM\Column(type="int", name="debit_count")
     */
    private $debitCount;
}
