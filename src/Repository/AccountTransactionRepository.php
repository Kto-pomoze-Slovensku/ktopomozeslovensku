<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Service\Account\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 */
final class AccountTransactionRepository extends EntityRepository
{
    public function getGroupedByDates()
    {
        $builder = $this->createQueryBuilder('q');

        dump($builder);
        exit;
    }
}
