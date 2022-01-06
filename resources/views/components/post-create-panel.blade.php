<div>
    <form method="post" action="{{ route('posts.store') }}" class="space-y-1"                    enctype="multipart/form-data"
    >
        @csrf
        <div>
            <x-post-textarea  name="title" rows="1"  error="{{ $errors->first('title') ?? ''}}"/>
        </div>
        <div class="flex justify-center items-center text-center">
            <x-add-post-tags/>
        </div>
        <div>
            <x-post-textarea name="excerpt" rows="3" error="{{ $errors->first('excerpt') ?? ''}}"/>
        </div>

        <div>
            <x-post-textarea name="body" rows="7"  error="{{ $errors->first('body') ?? ''}}"/>
        </div>
        <div class="w-full flex-col flex justify-start items-start">
            <label class="font-extrabold rounded justify-self-start text-lg custom-file-upload bg-gray-200  ">
                <input type="file" name="image"/>
                Upload post image
            </label>
            <div>
                <x-form.error error="{{ $errors->first('image')}}" />
            </div>
        </div>
        <div class="w-full text-center">
            <x-form.submit name="Publish Now" class="bg-red-800 hover:bg-red-900 text-white"/>
        </div>
    </form>
</div>

<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>
