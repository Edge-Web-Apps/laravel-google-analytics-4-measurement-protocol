<?php

namespace Freshbitsweb\LaravelGoogleAnalytics4MeasurementProtocol\Http\Controllers;

use App\Sanitizers\SanitizeHtmlPurifier;
//use ArondeParon\RequestSanitizer\Sanitizers\RemoveNonNumeric;
use App\Sanitizers\RemoveNonNumericWithDecimal;
use ArondeParon\RequestSanitizer\Traits\SanitizesInputs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;


class StoreRequest extends FormRequest
{
    //Adds trait that allows sanitizing inputs
    use SanitizesInputs;

    protected $sanitizers = [
        'session_id' => [
            RemoveNonNumericWithDecimal::class
        ],
        'session_number' => [
            RemoveNonNumericWithDecimal::class
        ],
        'client_id' => [
            RemoveNonNumericWithDecimal::class
        ],
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // No auth check needed
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
            'session_id' => 'nullable|sometimes|numeric',
            'session_number' => 'nullable|sometimes|numeric',
            'client_id' => 'nullable|sometimes|numeric'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
