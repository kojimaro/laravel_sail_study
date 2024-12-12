<div>
    <a href="{{$url}}">test</a>

    <video
        id="myVideo"
        controls
    >
        <source src="{{$url}}" type="video/mp4" />
    </video>
</div>

{{--@script
    <script>
        const url = '{{$url}}';

        fetch(url)
        .then(response => response.arrayBuffer())
        .then(arrayBuffer => {
            const blob = new Blob([arrayBuffer], { type: this.mimeType });
            const blobUrl = URL.createObjectURL(blob);

            var video = document.getElementById("myVideo");
            video.src = blobUrl;
        });
    </script>
@endscript--}}
