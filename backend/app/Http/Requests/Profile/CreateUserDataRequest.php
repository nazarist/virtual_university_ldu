<?php

namespace App\Http\Requests\Profile;

use App\Models\Faculty\Faculty;
use App\Models\Group\Group;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ldu_login'    => ['required', 'string'],
            'ldu_password' => ['required', 'string'],
            'faculty_id'   => ['required', 'exists:'.Faculty::class.',id'],
            'group_id'     => ['required', 'exists:'.Group::class.',id'],
            'course'       => ['required', 'integer', 'in:1,2,3,4,5']
        ];
    }
}
