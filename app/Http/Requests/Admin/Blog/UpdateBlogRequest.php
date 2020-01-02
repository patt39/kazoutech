<?php
namespace App\Http\Requests\Admin\Blog;

class UpdateBlogRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('update', $this->route('blogs'));
    }

} // class
