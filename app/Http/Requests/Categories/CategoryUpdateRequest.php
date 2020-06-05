<?php

namespace App\Http\Requests\Categories;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class CategoryUpdateRequest extends FormRequest
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
            'name' => 'required|max:250',
            'description'   =>  'required|max:250',
        ];
    }

    public function getValidRequest()
    {
        $image = $this->file('image');
        $slug = Str::slug($this->input('name'));

        if (isset($image)) {

            $imageExt = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . $imageExt;

            if (!Storage::disk('storage')->exists('category')) {
                Storage::disk('storage')->makeDirectory('category');
            }if (!Storage::disk('storage')->exists('category/thumbnail')) {
                Storage::disk('storage')->makeDirectory('category/thumbnail');
            }

            $postImage = Image::make($image)->fit(1060, 1060)
                ->save('storage/category/'.$imageName);

            $thumbnail = Image::make($image)->fit(550, 550)
                ->save('storage/category/thumbnail/'.$imageName);

        } else {
            $imageName = $this->image;
        }

        return [
            'title'   => $this->input('name'),
            'slug'  => Str::slug($this->input('name')),
            'description'   => $this->input('description'),
            'image' =>  $imageName,
        ];
    }
}
