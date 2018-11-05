<?php

namespace App\Http\Requests;

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
        if ($this->type == 1){
            return [
                'title' => 'required|max:100',
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required',
                'option_d' => 'required',
                'answer' => 'required|max:100',
            ];
        }else{
            return [
                'title' => 'required|max:100',
                'answer' => 'required|max:100',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => '题目必填',
            'title.max' => '题目最多100个字符',
            'option_a.required' => '选项A必填',
            'option_b.required' => '选项B必填',
            'option_c.required' => '选项C必填',
            'option_d.required' => '选项D必填',
            'answer.max' => '答案最多100个字符',
            'answer.required' => '答案必填',
        ];
    }

}
