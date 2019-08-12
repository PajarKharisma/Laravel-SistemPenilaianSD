@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                            
                            <div class="col-md-6">
                                <select id="jabatan" name="jabatan" class="form-control">
                                    <option value="999">Super Admin</option>
                                    <option value="998">Wali Kelas</option>
                                    <option value="0">Kepala Sekolah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_kelas" class="col-md-4 col-form-label text-md-right">{{ __('Id Kelas') }}</label>

                            <div class="col-md-6">
                                <input id="id_kelas" type="text" class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas" value="{{ old('id_kelas') }}" required autocomplete="id_kelas" readonly>

                                @error('id_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function setIdKelas(){ 
        let jabatan = $('#jabatan').val();
        if(jabatan == 998){
            $("#id_kelas").attr("readonly", false);
        } else{
            $("#id_kelas").attr("readonly", true);
            $("#id_kelas").val(-1);
        }
    }

    $(function () {
        $(document).ready( function () {
            setIdKelas();
        });
        
        $('#jabatan').change(function() {
            setIdKelas();
        });
    })
</script>
@endsection
