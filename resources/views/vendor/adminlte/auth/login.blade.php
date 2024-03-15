@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
@php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <section class="vh-100">
            <div class="container-fluid h-md-100">
                <div class="row d-flex justify-content-center align-items-center h-md-100">
                    <div class="col-lg-6 text-center h-100 px-5 pt-5 d-flex flex-column align-items-center justify-content-between"
                        style="background-image: url(https://intra.secoem.michoacan.gob.mx/template/assets/media/bg/bg-2.jpg); background-size: cover;">
                        <img class="img-fluid" width="50%"
                            src="https://intra.secoem.michoacan.gob.mx/images/logo.png">
                        <div class="align-items-center justify-content-between text-white py-5 py-md-0">
                            <div>
                                <h1>¡Bienvenido a tu portal!</h1>
                                <h6>Secretaría de Contraloría del Estado de Michoacán</h6>
                            </div>
                        </div>
                        <div class="d-sm-flex aling-items-center justify-content-between text-white w-100 pb-3 text-center small d-none d-lg-flex lh-1">
                            <div>
                                © 2024 Michoacan.gob.mx
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3 pt-1">
                                <a class="text-white" href="#">Privacidad</a>
                                <a class="text-white" href="#">Legal</a>
                                <a class="text-white" href="#">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <form class="px-4 px-lg-5 mx-lg-5 pt-4 pt-md-0">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <p class="h4 mb-0">Inicia sesión con
                                </p>
                                <a href="{{ url('/auth/redirect') }}" class="btn btn-link py-0"
                                    {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}>
                                    <i class="fab fa-google-plus fa-3x"></i></a>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Ó</p>
                            </div>

                            <!-- Email input -->
                            <div class="input-group mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}"
                                    autofocus>

                                {{-- <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div> --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('adminlte::adminlte.password') }}">

                                {{-- <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div> --}}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('adminlte::adminlte.remember_me') }}
                                    </label>
                                </div>
                                {{-- @if (Route::has('password.request'))
                                    <a class="text-body" href="{{ route('password.request') }}">
                                        {{ __('adminlte::adminlte.i_forgot_my_password') }}
                                    </a>
                                @endif --}}
                            </div>

                            <div class="text-center text-lg-start mt-2 pt-2 mb-2">
                                <div class="d-grid">
                                    <button type=submit
                                        class="btn btn btn-success btn-lg {{ config('adminlte.classes_auth_btn') }}">
                                        <span class="fas fa-sign-in-alt me-2"></span>
                                        {{ __('adminlte::adminlte.sign_in') }}
                                    </button>
                                </div>
                                {{-- <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? <a class="text-cyan"
                                        href="{{ $register_url }}">
                                        {{ __('adminlte::adminlte.register_a_new_membership') }}
                                    </a></p> --}}
                            </div>

                        </form>
                        <div class="d-sm-flex aling-items-center justify-content-between text-dark w-100 pb-3 text-center small d-md-none">
                            <div>
                                © 2024 Michoacan.gob.mx
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3 pt-1">
                                <a class="text-dark" href="#">Privacidad</a>
                                <a class="text-dark" href="#">Legal</a>
                                <a class="text-dark" href="#">Contacto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div
                class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                <!-- Copyright -->
                <div class="text-white mb-3 mb-md-0">
                    Copyright © 2020. All rights reserved.
                </div>
                <!-- Copyright -->

                <!-- Right -->
                <div>
                    <a href="#!" class="text-white me-4">
                        <i class="fa-brands fa-google"></i>
                    </a>

                </div>
                <!-- Right -->
            </div> --}}
        </section>
        <script src="https://kit.fontawesome.com/cb3b275039.js" crossorigin="anonymous"></script>
    </body>

</html>
