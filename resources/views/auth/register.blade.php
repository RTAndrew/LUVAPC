




@component('components.formAuth');
    @slot('form')
    <div class="login__form-wrapper--register">
        <div class="login__headline"> Painel de Cadastro para Candidatos </div>
        
        <form enctype="multipart/form-data"  class="grid-x grid-margin-x cadastro__form" method="POST" action="{{ route('create') }}">
            @csrf

            <div class="cell medium-12 large-12">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                <div class="col-md-6">
                    <input id="nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}"required autofocus>

                    @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-12 large-12">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Endereco') }}</label>

                <div class="col-md-6">
                    <input id="endereco" type="text" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" value="{{ old('endereco') }}"required autofocus>

                    @if ($errors->has('endereco'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-6 large-6">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Número do B.I') }}</label>

                <div class="col-md-6">
                    <input id="bi_numero" type="text" class="form-control{{ $errors->has('bi') ? ' is-invalid' : '' }}" name="bi_numero" value="{{ old('bi_numero') }}"required autofocus>

                    @if ($errors->has('bi_numero'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bi_numero') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-6 large-6">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Número de Telefone') }}</label>

                <div class="col-md-6">
                    <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}"required autofocus>

                    @if ($errors->has('telefone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-6 large-6">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>

                <div class="col-md-6">
                    <input id="data_nascimento" type="date" class="form-control{{ $errors->has('data_nascimento') ? ' is-invalid' : '' }}" name="data_nascimento" value="{{ old('data_nascimento') }}"required autofocus>

                    @if ($errors->has('data_nascimento'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('data_nascimento') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-6 large-6">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                <div class="col-md-6">
                    <select class="medium-6 large-6" name="sexo" id="sexo">    
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>










            <div class="escola__vagas cell medium-12 large-12">
                <p class="dashboard__candidatura-descricao"> <b> Upload do Bilhete de Identidade  </b> ** </p>
            </div>


            <div class="cell medium-12 large-12">

                <div class="col-md-6">
                    <input required accept="image/jpeg" id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}" >

                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div>









            


            <div class="escola__vagas cell medium-12 large-12">
                <p class="dashboard__candidatura-descricao"> <b>Credenciais do Sistema </b> ** </p>
            </div>


            <div class="cell medium-12 large-12">
                <label for="email" class="col-md-4 col-form-label text-md-right"><b> {{ __('E-Mail Address') }} </b></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-12 large-12">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell medium-12 large-12">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                </div>
            </div>

            <div class="cell medium-12 large-12">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="button primary--green" value="submit">
                        {{ __('Cadastrar-se') }}
                    </button>

                    <a class="login__login" href="{{ route('showlogin') }}">
                        {{ __('Fazer o Login?') }}
                    </a>

                    
                </div>

                <br>

                <a class="button primary--red" href="{{ route('home') }}">
                        {{ __('Página Inicial') }}
                </a>
            </div>
        </form>
    </div>
    @endslot
@endcomponent

                