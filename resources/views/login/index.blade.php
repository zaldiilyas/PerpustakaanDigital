<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }
        .judul {
            color: #000;
            position: absolute;
            left: 50%;
            transform: translate(-50%);    
        }
    </style>
</head>
<body>
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="judul">
                    <h1>Login</h1>
                </div>
                <form class="login" action="/login" method="POST">
                    @method('post')
                    @csrf
                    <div class="login__field">
                        <i class="login__icon bx bx-envelope"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon bx bx-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Login Now</span>
                        <i class="button__icon bx bx-right-arrow-alt"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <a href="/register" class="social-login__icon">Register <i class="bx bx-right-arrow-alt"></i></a>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>
</html>