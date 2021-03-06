<?php

namespace App\Http\Requests\Fish;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Fish;

class EditPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $fish = $this->route('fish');
        // 自分の魚であること
        return $fish->isOwner() && $fish->canEdit();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $fish = $this->route('fish');

        return Fish::validate($fish->id);
    }
}
