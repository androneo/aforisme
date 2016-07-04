<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AforismCreateRequest extends Request
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
        $this->sanitize();
        return [
            'content' => 'required',
            'răspuns' =>'sometimes|required',
            'tags' => 'required'
        ];
    }

    /**
    * Return the fields and values to create a new aforism from
    */
    public function aforismFillData()
    {
        return [
            'user_id' => $this->user()->id,
            'tag_id' => $this->input('tags'),
            'content' => $this->input('content'),
            'răspuns' => $this->input('răspuns'),
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['content'] = nl2br(filter_var($input['content'], FILTER_SANITIZE_STRING));

        if(isset($input['răspuns'])) {
            $input['răspuns'] = filter_var($input['răspuns'], FILTER_SANITIZE_STRING);
        }

        $this->replace($input);
    }
}
