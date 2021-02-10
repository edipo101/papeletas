<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanillaStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nroplanilla' => 'required',
            'gestion' => 'required|integer',
            'mes' => 'required',
            'modalidad_id' => 'required|integer',            
        ];
    }
}
