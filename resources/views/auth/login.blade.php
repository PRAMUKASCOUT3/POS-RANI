<!DOCTYPE html>
<html>

<head>
    <title>POS System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to  left, #ff5050 0%, #3399ff 100%);
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .img-header {
            height: 200px;
            background-size: cover;
            background-position: center;
            width: 800px;
        }

        .col-md-6 {
            padding: 20px;
            /* Padding di kolom diperkecil */
        }

        .form-control {
            font-size: 14px;
            /* Ukuran font input diperkecil */
        }

        .btn {
            font-size: 14px;
            /* Ukuran font tombol diperkecil */
        }

        .img-fluid {
            max-height: 300px;
            /* Batas tinggi maksimum gambar POS */
            width: auto;
        }

        /* Media query untuk layar kecil */
        @media (max-width: 768px) {
            .container {
                max-width: 95%;
                /* Container memenuhi lebar layar pada layar kecil */
            }

            .col-md-6 {
                padding: 10px;
                /* Padding lebih kecil pada layar kecil */
            }

            .img-fluid {
                max-height: 200px;
                /* Batas tinggi gambar POS lebih kecil */
            }
        }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container" style="background-color: #ffffff">
            <div class="row justify-content-center">
                <div class="wrap">
                    <div class="img-header" style="background-image: url(/assets/img/toko.jpeg);"></div>
                    <div class="row">
                        <div class="col-md-6 p-5">
                            <span class="mb-4 text-center" style="font-family :'Garamond">Selamat Datang Di POS</span>
                            <span class="mb-4 text-center" style="font-family :'Garamond">Toserba By Zulfff 🍪</span>
                            <form class="signin-form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="/assets/img/pos.jpg" alt="POS" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/be87c3e44a.js" crossorigin="anonymous"></script>
</body>

</html>
