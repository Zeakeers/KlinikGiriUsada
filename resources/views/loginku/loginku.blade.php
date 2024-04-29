<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <title>Document</title>
    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}

    </style>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      
                      <form action="{{ route('loginme') }}" method="POST">
                      <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Masuk</p>
          </div>

          <div class="divider d-flex align-items-center my-4">

          </div>
                        @csrf                 
                        <div class="form-outline mb-4">
                            <label for="user_nowa">Nomor Telepon</label>
                            <input type="number" name="user_nowa" id="user_nowa" class="form-control @error('user_nowa') is-invalid @enderror"
                            required autocomplete="user_nowa" 
                            placeholder="Masukkan Nomor Anda" value="{{ old('user_nowa')}}"/>
                            @error('user_nowa')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div> @enderror
                        </div>
      
                        <div class="form-outline mb-4">
                            <label for="password">Kata Sandi</label>
                            <input  type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                            required autocomplete="password" 
                            placeholder="Masukkan Kata Sandi Anda"/>
                            @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div> @enderror
                        </div>
      
                        <div class="text-center pt-1 mb-3 pb-1">
                          <button class="btn btn-primary form-control background-blue-1 mb-3 fw-semibold fs-5" type="submit">Masuk</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>