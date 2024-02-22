<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOffreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000', 
            'type_contract' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'status' => 'required|integer',
            'company_id' => 'required|integer|exists:companies,id',
            'domain_id' => 'required|integer|exists:domains,id',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }
}
