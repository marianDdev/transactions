<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface TransactionsInterface
 *
 * @package App\Contracts
 */
interface TransactionsInterface
{
    /**
     * @return Collection
     */
    public function getTransactions(): Collection;
}
