<?php

namespace Tests\Factories;

use App\Factories\TransactionsFactory;
use App\Repositories\Transactions\CsvTransactionsRepository;
use App\Repositories\Transactions\DbTransactionsRepository;
use PHPUnit\Framework\TestCase;

class TransactionsFactoryTest extends TestCase
{
    public function testGetCsvTransactionHandler()
    {
        $sourceType                = "csv";
        $csvTransactionsRepository = new CsvTransactionsRepository();
        $transactionFactory        = new TransactionsFactory($sourceType);

        return $this->assertEquals($csvTransactionsRepository, $transactionFactory->getTransactionsHandler());
    }

    public function testGetDbTransactionHandler()
    {
        $sourceType               = "db";
        $dbTransactionsRepository = new DbTransactionsRepository();
        $transactionFactory       = new TransactionsFactory($sourceType);

        return $this->assertEquals($dbTransactionsRepository, $transactionFactory->getTransactionsHandler());
    }

    public function testcannotGetTransactionHandler()
    {
        $sourceType         = "aaa";
        $transactionFactory = new TransactionsFactory($sourceType);

        return $this->assertEquals(null, $transactionFactory->getTransactionsHandler());
    }
}
