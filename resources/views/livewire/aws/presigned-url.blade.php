<div>
    <a href="{{$url}}">test</a>

    <video
        id="myVideo"
        controls
    >
        {{--<source src="{{$url}}" type="video/mp4" />--}}
    </video>
</div>

@script
    <script>
        const url = '{{route('api.presigned-url', ['v_id' => 1])}}';
        console.log(url)

        const response = await fetch(url);
        const blob = await response.blob();
        const blobUrl = URL.createObjectURL(blob);
        console.log(blobUrl);

        var video = document.getElementById("myVideo");
        video.src = blobUrl;

    </script>
@endscript
