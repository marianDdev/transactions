<?php

namespace Tests\Services;

use App\Contracts\TransactionsInterface;
use App\Repositories\Transactions\DbTransactionsRepository;
use App\Services\TransactionsService;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class TransactionsServiceTest extends TestCase
{
    public function testGetTransactions()
    {
        $dbRepositoryMock = $this->createMock(DbTransactionsRepository::class);

        $transactions = new  Collection([]);
        $dbRepositoryMock->expects($this->once())
            ->method('getTransactions')
            ->willReturn($transactions);

        $transactionsService = new TransactionsService($dbRepositoryMock);

        $this->assertEquals($transactions, $transactionsService->getTransactions());
    }
}
