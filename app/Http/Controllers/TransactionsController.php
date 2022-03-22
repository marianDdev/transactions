<?php

namespace App\Http\Controllers;

use App\Factories\TransactionsFactory;
use App\Services\TransactionsService;
use App\Services\ValidationsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /***
     * @param Request            $request
     * @param ValidationsService $validationsService
     *
     * @return JsonResponse
     */
    public function index(Request $request, ValidationsService $validationsService): JsonResponse
    {
        $validator = $validationsService->validateSourceType($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $transactionsFactory = new TransactionsFactory($request->input('source'));
        $transactionsService = new TransactionsService($transactionsFactory->getTransactionsHandler());
        $transactions        = $transactionsService->getTransactions();

        return new JsonResponse(
            [
                "source_type"  => $request->input('source'),
                "transactions" => $transactions,
            ]
        );
    }
}
