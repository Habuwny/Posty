<div>
    <form method="post" action="{{ route('posts.store') }}" class="space-y-6" enctype="multipart/form-data"
    >
        @csrf
        <div>
            <div class="ring-4 bg-slate-800 ring-slate-400  rounded-xl">
                <x-post-textarea name="title" rows="2" characters="60"
                                 class="md:text-4xl max-h-32 lg:text-5xl font-black h-32  min-h-full"/>
                <div class="flex py-1 justify-center items-center text-center">
                    <x-add-post-tags/>
                </div>
            </div>
            <x-form.error :error="$errors->first('title') ?? ''"/>

        </div>

        <div>
            <x-post-textarea name="excerpt" rows="3" error="{{ $errors->first('excerpt') ?? ''}}" characters="220"
                             class=" max-h-32 h-32 min-h-full"/>
        </div>

        <div>
            <x-post-textarea name="body" rows="7" error="{{ $errors->first('body') ?? ''}}" class="max-h-96"
                             characters="500"/>
        </div>
        <div class="w-full flex-col flex justify-start items-start">
            <div class="flex items-center space-x-6">
                <label class="font-extrabold rounded justify-self-start text-lg text-white custom-file-upload bg-slate-800"
                       characters="50">
                    <input type="file" name="image" id="post-image"/>
                    Upload post image
                </label>
                <div>
                    <img
                        class="rounded-xl"
                        id="preview-image-before-upload"
                         src="{{ asset('storage/' . "post/bg/defaault.jpg") }}"
                         alt="preview image" style="max-height: 80px;min-width: 150px">
                </div>

            </div>
            <div>
                <x-form.error error="{{ $errors->first('image')}}"/>
            </div>
        </div>
        <div class="w-full text-center">
            <x-form.submit name="Publish Now" class="bg-red-800 hover:bg-red-900 text-white"/>
        </div>
    </form>
</div>
<script>
</script>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#post-image').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
