<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaperRequest extends FormRequest
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
            'title' => 'required|max:100',
            'type_1_per_score' => 'required_unless:questions_type1,',
            'type_2_per_score' => 'required_unless:questions_type2,',
            'type_3_per_score' => 'required_unless:questions_type3,',
            'type_4_per_score' => 'required_unless:questions_type4,',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '名称必填',
            'title.max' => '名称最多100个字符',
            'type_1_per_score.required' => '选择题分数必填',
            'type_2_per_score.required' => '判断题分数必填',
            'type_3_per_score.required' => '填空题分数必填',
            'type_4_per_score.required' => '问答题分数必填',
            'answer.max' => '答案最多100个字符',
            'answer.required' => '答案必填',
        ];
    }
}
