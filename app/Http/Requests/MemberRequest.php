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
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'tel' => 'required|string|max:11',
        ];

        $route = $this->route()->getName();
        if ($route === 'members.store') {
            $rule['file'] = 'required';
        }

        return $rule;
    }
}
