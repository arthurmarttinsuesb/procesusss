@extends('auth.app')
@section('htmlheader_title', 'Login')
 @section('contentheader_title', 'Login')
@section('conteudo')
<div class="login-box">
        <div class="login-logo">
                <a href="{{ url('/home') }}"><img src="{{url('/img/logo-processus.png')}}"
                   alt="Processus" style="width: 50%; height: auto;"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Faça o login para iniciar a sua sessão</p>

            <form method="POST" action="{{ route('login') }}">
               @csrf
                <div class="input-group mb-3">
                <input placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </div>
                <div class="input-group mb-3">
                <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Lembre-se
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="/password/reset">>> Esqueceu a senha?</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">>> Ainda não possui uma conta, cadastre-se.</a>
            </p>
            <p class="mb-0">
                <a href="/sobre/geral" target="blank" class="text-center">>> Sobre o Sistema</a>
            </p>
            <br>
            <hr>
            <div class="login-logo">
                    <a href="/sobre"><img src="{{url('/img/footer_logo.jpeg')}}"
                    alt="Processus" style="width: 100%; height: auto;"></a>
            </div>

            </div>
            <!-- /.login-card-body -->
        </div>
</div>

@endsection
