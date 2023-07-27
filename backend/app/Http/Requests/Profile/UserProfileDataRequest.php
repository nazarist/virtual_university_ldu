<?php

namespace App\Http\Requests\Profile;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileDataRequest extends FormRequest
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
            'faculty_id'   => ['required', 'exists:' . Faculty::class . ',id'],
            'group_id'     => ['required', 'exists:' . Group::class . ',id'],
            'course'       => ['required', 'integer', 'in:1,2,3,4,5'],
            'user_id'      => ['required', 'exists:' . User::class . ',id', 'unique:'.UserProfile::class]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id()
        ]);
    }
}
