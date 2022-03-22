<?php

namespace App\Services;

use App\Contracts\TransactionsInterface;
use Illuminate\Support\Collection;

class TransactionsService
{
    /**
     * @var TransactionsInterface
     */
    private TransactionsInterface $transactions;

    public function __construct(TransactionsInterface $transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return Collection
     */
    public function getTransactions(): Collection
    {
        return $this->transactions->getTransactions();
    }
}
