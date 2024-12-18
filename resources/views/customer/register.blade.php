@extends("layout.main")
@section("main")
    <div class="container">
        <div class="p-5"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customer Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.save') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="formcontrol @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="formcontrol @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('address') isinvalid @enderror" name="address"
                                           value="{{ old('address') }}" required />
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                           class="form-control @error('phone') isinvalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required />
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                                <div class="col-md-6">
                                    <input id="birthday" type="date"
                                           class="form-control @error('birthday') isinvalid @enderror" name="birthday"
                                           value="{{ old('birthday') }}" required />
                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>--}}
{{--                                <div class="form-check">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-text">--}}
{{--                                            <input type="radio" checked class="mr3" name="gender" value="1" id="male">--}}
{{--                                            <label class="form-checklabel" for="male"> Male </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="input-group-text">--}}
{{--                                            <input type="radio" class="mr3" name="gender" value="0" id-="female">--}}
{{--                                            <label class="form-checklabel" for="female"> Fe Male </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') isinvalid @enderror" name="password"
                                            />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="passwordconfirm" type="password" class="form-control"
                                           name="password_confirmation" required />
                                    @error('password_confirmation')
                                    <span class="invalid-feedback d-block" role="alert">
 <strong>{{ $message }}</strong>
 </span>
                                    @enderror
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
        <div class="p-5"></div>
    </div>
@endsection
