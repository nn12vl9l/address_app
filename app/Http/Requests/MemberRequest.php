<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
        $rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
        ];

        $route = $this->route()->getName();
        if ($route === 'members.store') {
            $rule['file'] = 'required|file|image';
        }

        return $rule;
    }
}
