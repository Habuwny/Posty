<div class=" ">
    <input id="tagsInput" value="" name="tags" class="hidden">
    <span
        onclick="addJSTag(this.id)"
        id="jsTag"
        class="rounded  text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-black">#Javascript</span>
    <span
        onclick="addJSTag(this.id)"
        id="htmlTag"
        class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4  bg-black">#Html</span>
    <span
        onclick="addJSTag(this.id)"
        id="nodeTag"
        class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-black">#NodeJs</span>
    <span
        onclick="addJSTag(this.id)"
        id="phpTag"
        class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4  bg-black">#Php</span>
    <span
        onclick="addJSTag(this.id)"
        id="vueTag"
        class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-black">#VueJs</span>
    <span
        onclick="addJSTag(this.id)"
        id="reactTag"
        class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4   bg-black">#ReactJs</span>
</div>

<script>
    let tags = []
    function addJSTag(e) {
        let js = document.getElementById(e);


        if (js.classList.contains('jsRemoveTagBg')) {
            js.classList.remove('jsRemoveTagBg')
            js.classList.add('jsAddTagBg')
            if (!tags.includes(js.innerHTML)){
                tags.push(js.innerHTML)
            }
        } else if (!js.classList.contains('jsRemoveTagBg') && !js.classList.contains('jsAddTagBg')) {
            js.classList.add('jsAddTagBg')
            if (!tags.includes(js.innerHTML)){
                tags.push(js.innerHTML)
            }
        } else if (js.classList.contains('jsAddTagBg')) {
            js.classList.remove('jsAddTagBg')
            js.classList.add('jsRemoveTagBg')
            if (tags.includes(js.innerHTML)){
                // tags.push(js.innerHTML)
                tags = tags.filter(item => item !== js.innerHTML)
            }
        }
        document.getElementById('tagsInput').value = tags;

    }
</script>
<style>
    .jsAddTagBg {
        background-color: rgb(76 29 149);
    }

    .jsRemoveTagBg {
        background-color: #000;
    }
</style>
