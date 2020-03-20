<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Service\Account\Model;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 */
final class AccountStatement
{
    /**
     * @var Info
     *
     * @Serializer\Type(name="App\Service\Account\Model\Info")
     * @Serializer\SerializedName("info")
     */
    private $info;

//    /**
//     * @var Collection|Transaction[]
//     *
//     * @Serializer\Type(name="ArrayCollection<'App\Service\Account\Model\Info\Transaction'>")
//     * @Serializer\SerializedName(name="transactionList")
//     */
//    private $transactionList;

//    /**
//     * @param Info $info
//     * @param Collection $transactionList
//     *
//     */
//    public function __construct(Info $info, Collection $transactionList)
//    {
//        $this->info = $info;
//        $this->transactionList = $transactionList;
//    }
//
//    /**
//     * @return Info
//     */
//    public function getInfo(): Info
//    {
//        return $this->info;
//    }
//
//    /**
//     * @param Info $info
//     */
//    public function setInfo(Info $info): void
//    {
//        $this->info = $info;
//    }
//
//    /**
//     * @return Transaction[]|Collection
//     */
//    public function getTransactionList(): Collection
//    {
//        return $this->transactionList;
//    }
//
//    /**
//     * @param Collection $transactionList
//     */
//    public function setTransactionList(Collection $transactionList): void
//    {
//        $this->transactionList = $transactionList;
//    }
}
