<?php

namespace App\Http\Requests\ProposedSale;

use Illuminate\Foundation\Http\FormRequest;

class ProposedSaleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_sold' => ['required', 'min:5', 'max:50'],
            'price' => ['required', function ($attribute, $value, $fail) {
                $formattedValue = (float) str_replace(',','.',str_replace('.','',$value));
                $ruleValue = 0.01;
                if ($formattedValue <= $ruleValue) {
                    $fail('O valor deve ser superior a R$ 0.01 (use . no decimal)');
                }
            },]
        ];
    }
}
