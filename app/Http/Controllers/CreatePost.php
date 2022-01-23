<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageResize;

class CreatePost extends Controller
{
    public function store()
    {
        $slugged = AppHelper::instance()->uniqueText(
            trim(request()->title),
            "slug"
        );
//    $excerpt = AppHelper::instance()->postExcerpt(
//      trim(request()->body)
//    );

        $checkValues = collect($this->validatePost())
            ->only("title", "tags", "email", "body", "excerpt")
            ->toArray();
        request()->slug = $slugged;
        $attributes = array_merge($checkValues, [
            "user_id" => request()->user()->id,
            "slug" => request()->slug,
        ]);
        $post = Post::create($attributes);

        $img = request()->file("image");
        if ($img) {
            $extensions = collect(["jpg", "jpeg", "png"]);

            $postSlug = $post->slug;
            foreach ($extensions as $oldExtension) {
                $imgPath = "post/bg/$postSlug.$oldExtension";
                if (Storage::exists($imgPath)) {
                    Storage::delete($imgPath);
                }
                $extension = $img->getClientOriginalExtension();
                $img_path = $postSlug . "." . $extension;
                $path = storage_path("app\\public\\post\\bg\\");

                ImageResize::make($img)
                    //          ->resize(1700, 450)
                    ->fit(1700, 450)
                    ->save($path . $img_path);
                $path_ = "post/bg/$postSlug.$extension";
                Image::where("type_id", "=", $post->id)
                    ->where("type", "=", "post")
                    ->delete();
            }
            Image::create([
                "type" => "post",
                "type_id" => $post->id,
                "path" => $path_,
            ]);
        }
        //SAVE IMAGE
        if (request()->file("pg")) {
            $extensions = collect(["jpg", "jpeg", "png"]);
            $extension = request()
                ->file("pg")
                ->getClientOriginalExtension();
            $slugName = $post->slug;
            foreach ($extensions as $oldExtension) {
                $imgPath = "user/avatars/$slugName.$oldExtension";
                if (Storage::exists($imgPath)) {
                    Storage::delete($imgPath);
                }
            }
            $img = request()
                ->file("pg")
                ->storeAs("post/pg", $slugName . ".$extension");
            Image::create(["type" => "post", "type_id" => $post->id, "path" => $img]);
        }
        $tags = $post->tags;
        foreach (explode(",", $tags) as $tag) {
            $tagId = Tag::where("name", "=", $tag)->value("id");
            if ($tagId) {
                $post->categories()->attach($tagId);
            }
        }
        return redirect("/")->with("success", "Post Published 👍 🎉");
    }

    protected function validatePost(): array
    {
        return request()->validate(
            [
                "title" => ["required", "min:5", "max:60"],
                "tags" => ["max:255, required"],
                "excerpt" => ["required", "max:220", "min:10"],
                "body" => ["required", "min:30"],
                "image" =>
                    "required|image|mimes:jpg,png,jpeg|max:3072|dimensions:min_width=1000,min_height=500",
            ],
            [
                "image.mimes" => "the image must be in type jpg, png or jpeg",
                "image.dimensions" =>
                    "The post image must be at least :min_width x :min_height pixels",
                "image.max" => "the image size  must not be more than 3072 MB",
                "image.required" => "post needs an image",
            ]
        );
    }
}
