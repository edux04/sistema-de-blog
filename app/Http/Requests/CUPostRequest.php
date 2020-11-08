<?php

namespace App\Http\Requests;

use DateTime;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CUPostRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required|max:10000',
            'category_id' => 'required|int',
            'posted_at' => 'required|date_format:Y-m-d H:i:s',
            'image' => 'sometimes|file|image|max:10000'

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'posted_at' => Carbon::parse($this->posted_at)->format('Y-m-d H:i:s'),
        ]);
    }
}