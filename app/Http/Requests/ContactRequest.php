<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ContactRequest extends FormRequest
{
    /**
     * Determine if User is Authorised to make this request
     *
     * @return booll
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the Validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string|min:8|max:11'
        ];
    }
}
?>