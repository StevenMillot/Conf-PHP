<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'title'          => 'required',
            'slug'           => 'required',
            'url_site'       => 'url',
            'excerpt'        => 'required',
            'content'        => 'required',
            'date_start'     => 'required',
            'date_end'       => 'required',
            'thumbnail_link' =>'mimes:jpeg,jpg,png|required',
            'tags'
        ];
    }
}
