<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) PackageBackup <hello@draperstud.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PackageBackup\Rewardable\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
{
    public function __construct($type, $id, $credits)
    {
        $credits = abs($credits);

        $type = get_class($type);

        parent::__construct("Entity [{$type}] with ID [{$id}] is missing [{$credits}] credits.");
    }
}
