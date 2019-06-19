<?php

namespace App\Http\Requests;

use App\Question;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' => 'required|string',
            'body' => 'required|string',
            'tag' => 'required|string',
        ];
    }
    public function processQuestionRequest()
    {
        auth()->user()->ask(new Question(array_add($this->only(['title', 'body', 'tag']), 'user_id', auth()->id())));
    }
}