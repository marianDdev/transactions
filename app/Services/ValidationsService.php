<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ValidationsService
{
    /**
     * @param array $input
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateSourceType(array $input): \Illuminate\Contracts\Validation\Validator
    {
        $sourceTypes = ["csv", "db"];

        return Validator::make(
            $input,
            [
                'source' => [Rule::in($sourceTypes), 'required', 'string', 'min:2'],
            ],
            [
                'source.in'       => 'Enter a valid source type',
                'source.required' => 'Source is required',
                'source.string'   => 'Source must be of type string',
                'source.min'      => 'Source must have at least :min characters',
            ]
        );
    }
}
