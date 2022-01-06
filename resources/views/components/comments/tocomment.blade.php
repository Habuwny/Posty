@php
    $user =  auth()->user()
@endphp
<div>
    <div class="w-full">
        <div>
            <x-user-snippet :user="$user" />
        </div>
        <div class="w-full relative mt-3">
            <form action="{{ route('post.comment', ["post"=> $post->id]) }}" method="POST">
                <div class="mx-auto flex flex-col items-center relative">
                <textarea
                    onchange="textareaChange()"
                    name="content"
                    rows="7"
                    id="textarea-small-box"
                    class="ring-2 ring-blue-500 focus:ring-blue-500 focus:ring-4 focus:outline-none bg-gray-300 text-xl p-3 w-11/12 sm:w-11/12 md:w-9/12 lg:w-6/12  h-60 resize-none rounded-xl"
                    placeholder="What Do yo think ? 🤔"

                ></textarea>
                    <div class="absolute translate-y-1/2 bottom-0 ">

                        @csrf
                        <x-form.submit name="Publish"
                                       class="submit-btn py-1 bg-red-800 hover:bg-red-900 disabled:bg-red-900 text-white"/>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
<style>
    #textarea-small-box::placeholder {
        color: #185F8D;
        top: 0;
        left: 0;
        /*font-weight: bold;*/
        text-align: center;
        transform: translateY(80px);
    }
</style>

<script type="text/javascript">
    const elSelector = document.querySelector('#textarea-small-box');
    const btnEl = document.querySelector('.submit-btn');
    let val = elSelector.value;
    if (val.length > 1) {
        btnEl.removeAttribute("disabled");
    } else {
        btnEl.setAttribute("disabled", "");
    }
    elSelector.addEventListener('input', () => {
        val = elSelector.value;
        if (val.length >= 1) {

            btnEl.removeAttribute("disabled");
        } else {
            btnEl.setAttribute("disabled", "");
        }
    })
</script>
