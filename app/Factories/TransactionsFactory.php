<?php

namespace App\Factories;

use App\Contracts\TransactionsInterface;
use App\Repositories\Transactions\CsvTransactionsRepository;
use App\Repositories\Transactions\DbTransactionsRepository;

/**
 * Class TransactionFactory
 *
 * @package App\Factories
 */
class TransactionsFactory
{
    private string $sourceType;

    public function __construct(string $sourceType)
    {
        $this->sourceType = $sourceType;
    }

    /**
     * @return TransactionsInterface|null
     */
    public function getTransactionsHandler(): ?TransactionsInterface
    {
        if ($this->sourceType === "csv") {
            return new CsvTransactionsRepository();
        } elseif ($this->sourceType === "db") {
            return new DbTransactionsRepository();
        }

        return null;
    }

}
