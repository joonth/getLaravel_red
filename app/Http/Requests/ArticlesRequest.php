<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{

    protected $dontFlash = ['files'];

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
            'title' => ['required'],
            'content' => ['required', 'min:10'],
            'tags' => ['required','array'],
            'files' => ['array'],
            'files.*' => ['mimes:jpg,png,zip,tar','max:30000'],
        ];
    }

    public function messages()
    {
       return [
       ];
    }

    public function attributes(){
        return [
          'title' => '제목',
          'content' => '본문' ,
        ];
    }
}
