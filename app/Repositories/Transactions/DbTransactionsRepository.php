<?php

namespace App\Repositories\Transactions;

use App\Contracts\TransactionsInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * Class DbTransactionsRepository
 *
 * @package App\Repositories\Transactions
 */
class DbTransactionsRepository implements TransactionsInterface
{

    public function getTransactions(): Collection
    {
        return Cache::remember(
            'transactions',
            600,
            function () {
                return DB::table('transactions')->get()->chunk(30);
            }
        );
    }
}
