<?php

namespace App\Repositories\Transactions;

use App\Contracts\TransactionsInterface;
use Illuminate\Support\Collection;

/**
 * Class CsvTransactionsRepository
 *
 * @package App\Repositories\Transactions
 */
class CsvTransactionsRepository implements TransactionsInterface
{
    /**
     * @return Collection
     */
    public function getTransactions(): Collection
    {
        $transactionsString     = trim(file_get_contents(public_path('transactions.csv')));
        $transactionsCollection = new Collection();
        $transactionsList       = explode("\n", $transactionsString);
        array_shift($transactionsList);

        foreach ($transactionsList as $line) {
            $transaction = explode(",", $line);
            [$id, $code, $amount, $userId, $createdAt, $updatedAt] = $transaction;
            $transactionsCollection->push(
                [
                    "id"         => $id,
                    "code"       => $code,
                    "amount"     => $amount,
                    "user_id"    => $userId,
                    "created_at" => $createdAt,
                    "updated_at" => $updatedAt,
                ]
            );
        }

        return $transactionsCollection;
    }
}
