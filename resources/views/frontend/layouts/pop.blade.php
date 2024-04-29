<!DOCTYPE html>
<html>
    <head>
        <title>Laravel App</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">

            
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const popup = document.createElement('div');
                popup.classList.add('popup');
                popup.innerHTML = `
                <div class = "container" style"">
                    <div class="popup-content">
                    <img class ="close-btn" src="{{ asset('frontend/cancel.png') }}" alt="">
                    @if(isset($notification))
                        <div class="alert alert-warning">
                        {{ $notification }}
                        </div>
                    @endif
                                @foreach ($pengumumans as $berita)
                    <div class="col-md-6 container">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/pengumuman/'.$berita->pengumuman_gambar) }}" class="card-img-top" alt="{{ $berita->pengumuman_judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->pengumuman_judul }}</h5>
                                <p class="card-text">{{ $berita->pengumuman_deskripsi }}</p>
                                <button id="btn-test" class="btn btn-primary">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    </div>
                `;
                document.body.appendChild(popup);

                const closeBtn = document.querySelector('.close-btn');
                closeBtn.addEventListener('click', function() {
                    popup.style.display = 'none';
                });
                const inBtn = document.querySelector('#btn-test');
                inBtn.addEventListener('click', function() {
                    // alert('test');
                    location.href = "#posts";
                    popup.style.display = 'none';
                    // setInterval(()=>{
                    //     alert('test');
                    // }, 1000);
                });

            });
        </script>

        <style>
            .popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                /* background-color:  rgba(0, 0, 0, 0.05);; */
                background-color: #fff;
                border-style: solid ;
                border-color: gray;
                padding: 50px;
                border-radius: 10px;
                z-index: 99999; 
            }

            .popup-content {
                border: none;
                text-align: center;
                
            }
            
            .close-btn {
                opacity: 100%;
                position: absolute;
                top: 10px;
                right: 10px;
                width: 50px;
                padding: 10px;
                border: none;
                cursor: pointer;
            }
            .image{
                opacity: 100%;
            }
        </style>
    </body>
</html>

