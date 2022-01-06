@props(['post' => null, 'isLiked' => null, 'width', 'height'])

<svg title="like" fill="fill-gray-200" id="Icons" width="{{$width}}" height="{{$height}}"
     style="enable-background:new 0 0 32 32;"
     version="1.1" viewBox="0 0 32 32" xml:space="preserve"
     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style
        type="text/css">
        .st0 {
            fill: #fff;
            stroke: #000000;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-miterlimit: 10;
        }
    </style>

    <path
        id="{{ $post ? 'like-heart':'' }}"
        class="fill-slate-500 transition-all {{ $isLiked ? 'jsAddLike' : 'jsRemoveLike' }}"
        d="M27.8,6.3C26.3,4.8,24.4,4,22.3,4c-2.1,0-4,0.8-5.4,2.3L16,7.2l-0.9-0.9C13.7,4.8,11.8,4,9.7,4c-2.1,0-4,0.8-5.4,2.3  c-3,3.1-3,8.1,0,11.1L15,28.6c0.3,0.3,0.6,0.4,1,0.4s0.7-0.2,1-0.4l10.8-11.1C30.7,14.4,30.7,9.4,27.8,6.3z M23,16h-3  c-0.3,0-0.6-0.2-0.8-0.4l-0.9-1.4l-1.3,3.2C16.8,17.7,16.4,18,16,18c0,0,0,0,0,0c-0.4,0-0.7-0.2-0.9-0.6l-1.4-2.8l-1,1  C12.5,15.9,12.3,16,12,16H9c-0.6,0-1-0.4-1-1s0.4-1,1-1h2.6l1.7-1.7c0.2-0.2,0.5-0.3,0.9-0.3c0.3,0.1,0.6,0.3,0.7,0.5l1,2l1.2-2.9  c0.1-0.3,0.5-0.6,0.8-0.6c0.4,0,0.7,0.1,0.9,0.4l1.7,2.6H23c0.6,0,1,0.4,1,1S23.6,16,23,16z"/></svg>
