<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\returnArgument;

class UpdateUserRequest extends FormRequest
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
     * @return
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required', Rule::unique('users')->ignore($this->route('user')->id),
        ];

        if (empty($this->get('password'))) {
            $this->except('password');
        } elseif ($this->filled('password')) {
            $rules['password'] = 'confirmed|min:8';
        }

        return $rules;
    }

}
