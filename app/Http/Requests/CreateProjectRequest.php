<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


//文档：https://learnku.com/docs/laravel/5.7/validation/2262

class CreateProjectRequest extends FormRequest
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
            // 'name' => 'required|unique:projects',  //projects表中name字段规则-->必填|唯一
            'name' => [
                'required',
                Rule::unique('projects')->where(function($query){
                    return $query->where('user_id',request()->user()->id);
                }),
            ],  //projects表中name字段必填，同一用户不能重复项目name
            'thumbnail' => 'image|dimensions:min_width=260,min_height=100' //图片格式，最小宽度260px
        ];
    }

    /**
     * 自定义错误信息
     */
    public function message(){
        return [
            'name.required' => '项目名称是必填的',
            'name.unique' => '项目名称重复',
            'thumbnail.image' => '缩略图格式不对！',
            'thumbnail.dinmensions' => '缩略图最小尺寸是260*100',
        ];
    }
}
