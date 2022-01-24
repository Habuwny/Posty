<x-layout>
    @php
            $userImages= \App\Models\Image::where('type_id', '=', auth()->user()->id)->where('type', '=', 'user')->first();
            if ($userImages) {
                    #dd($userImages);
                   $path = asset('storage/' .  $userImages->path);
            }
            else{
                $path = asset('storage/' . "user/avatar/default.png");
            }
        $un = '@'.$user->username;
        $pass = 'كل2f-ffR';
    @endphp
    <div class="flex-col flex-col-reverse h-full flex lg:flex-row bg-black">
        <div class="h-fit items-start  w-full bg-gray-700 lg:w-2/3 lg:items-center flex   lg:h-screen">
            <form method="post" action="{{ route('user.update', ['user'=>$user->username]) }}"
                  class="mt-7 lg:mt-0 space-y-3 px-6  text-center w-full"
                  enctype="multipart/form-data"
            >
{{--            <form>--}}
                @csrf
                @method('PUT')
                <x-form.input :value="$user->name" name="name" type="text" error="{{ $errors->first('name') ?? '' }}"/>
                <x-form.input :value="$user->email" name="email" type="email"
                              error="{{ $errors->first('email') ?? '' }}"/>
                <x-form.input :value="$user->username" name="username" type="text"
                              error="{{ $errors->first('username') ?? '' }}"/>
                <x-form.input :value="$pass" name="password" type="password"
                              error="{{ $errors->first('password') ?? '' }}"/>
                <div class="w-full  flex flex-col justify-start items-start">
                    <div class="flex items-center space-x-6">

                    <label class="font-extrabold rounded justify-self-start text-lg custom-file-upload bg-gray-200  ">
                        <input id="user-avatar" value="{{ old('file') }}" type="file" name="image"/>
                       {{ old('image') ? old('image') : 'Upload new image ' }}
                    </label>
                    <div>
                        <img
                            class="rounded-full"
                            id="preview-image-before-upload-avatar"
                            src="{{$path}}"
                            alt="preview image" style="max-height: 60px;min-width: 60px">
                    </div>
                    </div>
                    <div>
                    <x-form.error error="{{ $errors->first('image')}}" />
                    </div>
                </div>
                {{--                <x-form.input value="" name="avatar" type="file" error="{{ $errors->first('password') ?? '' }}"/>--}}
                <div class="mt-6">
                    <x-form.submit name="Update Your Credentials"
                                   class="text-2xl font-extrabold text-white bg-red-700 hover:bg-red-900 "/>
                </div>
            </form>
        </div>
        <div class="pt-1 lg:pt-0 w-full bg-gray-600 lg:w-1/3 flex space-y-3 flex-col items-center justify-center">
            <div class="">
{{--                <img src="https://i.pravatar.cc/500?u={{ $user->id }}" alt="avatar" height="200" width="200"--}}
{{--                     class=" rounded-full border-solid border-2 border-light-blue-500">--}}
                <x-user.avatar widths=200 heights=200 :userId="$user->id"/>

            </div>
            <div>
                <h1 class="text-3xl tracking-wider text-white font-black">{{ $user->name}}</h1>
            </div>
            <div>
                <h1 class="text-3xl  text-white font-black">{{ $un}}</h1>
            </div>
            <div>
                <h1 class="text-3xl  text-blue-500 font-black">#Start</h1>
            </div>

        </div>
    </div>
</x-layout>

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
        $('#user-avatar').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload-avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

