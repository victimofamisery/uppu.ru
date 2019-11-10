
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Список</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .dropdown{
                display: none;
                position: absolute;               
                color:white;
                background:black; 
                z-index: 1;
                top:100%;
            }  

            a:hover  + .dropdown{                
                display: block !important;
            }
            .dropdown:hover{
                display: block !important;
            }
        </style>
<!--       <script>
        function show_image(src, width, height, alt) {
    var img = document.createElement("img");
    img.src = src;
    img.width = width;
    img.height = height;
    img.alt = alt;

    // This next line will just add it to the <body> tag
    document.body.appendChild(img);}
    </script>-->

    </head>
    <body>        
        @php
        $getID3=new \getID3;
        @endphp
        @foreach($paths as $path) 
        <div style="position:relative;">
            <a class="link" href="{{ asset('/storage/'.$path['path'])}}" ><p>{{$path['path']}}</p></a>
            <div class="dropdown">
                @php
                $tags=$getID3->analyze(Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($path['path']));
                @endphp
                @if((isset($tags['fileformat'])) &&
                ($tags['fileformat']=='tiff'||$tags['fileformat']=='jpeg'||$tags['fileformat']=='png'||$tags['fileformat']=='gif'||$tags['fileformat']=='jpg'))                    
                <img  src="{{ asset('/storage/'.$path['path'])}}" height="300px">
                @elseif((isset($tags['fileformat'])) && 
                ($tags['fileformat']=='mp3'||$tags['fileformat']=='wma'||$tags['fileformat']=='aac'||$tags['fileformat']=='wav'||$tags['fileformat']=='flac'))
                <p>
                    <img src="data:{{$tags['id3v2']['APIC'][0]['image_mime']}};base64,{{base64_encode($tags['id3v2']['APIC'][0]['data'])}}" height="300px"><br>
                    {{$tags['tags']['id3v2']['artist'][0]}}<br>
                    {{$tags['tags']['id3v2']['album'][0]}}<br>
                    {{$tags['tags']['id3v2']['title'][0]}}<br>
                    <audio src="media/{{$path['path']}}" controls ></audio>
                </p> 
                @elseif((isset($tags['fileformat'])) && 
                ($tags['fileformat']=='mp4'))
                  <video controls preload="auto" src="media/{{$path['path']}}" height="300px"></video>
                    
                @endif  
            </div>
        </div>
        @endforeach
    </body>
</html>
