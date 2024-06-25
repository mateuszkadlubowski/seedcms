@extends("admin.layout")

@section("title", isset($data) ? __('admin.users.menu.edit') : __('admin.users.menu.create'))

@section("content")
    <section class="card card-section">
        <div class="card-header">
            <h2 class="card-title">{{ __('admin.profile.card.basic_info') }}</h2>
        </div>
        <div class="card-body py-5">
            <x-form :schema="$schema" :$data action="{{ route('admin.settings.update') }}" class="admin-form js-form-spin" method="post" />
            <form method="post" action="{{ route('admin.profile.update') }}"
                  class="admin-form js-form-spin"
                  novalidate enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="form-type" value="basic-info">
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">{{ __('admin.form.username') }}
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                               autocomplete="username"
                               name="username" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">{{ __('admin.form.email') }}
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div class="form-text">{{ __('admin.form.help_text.email_verify') }}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('admin.form.name') }}</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               autocomplete="name"
                               name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 offset-2">
                        <div class="form-avatar">
                            <img
                                src="{{ $user->avatar ? asset('uploads/'.$user->avatar) : asset('img/admin/user_placeholder.svg') }}"
                                alt="{{ __('admin.form.avatar') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="avatar" class="col-sm-2 col-form-label">{{ __('admin.form.avatar') }}</label>
                    <div class="col-sm-3">
                        <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar"
                               name="avatar">
                        @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 offset-sm-2">
                        <div class="form-check form-check--toright">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_avatar"
                                   name="delete_avatar">
                            <label class="form-check-label" for="delete_avatar">
                                {{ __('admin.form.delete_avatar') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3 offset-sm-2">
                        <button type="submit" class="btn btn-cta">{{ __('admin.form.btn.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="card card-section">
        <div class="card-header">
            <h2 class="card-title">{{ __('admin.profile.card.change_pass') }}</h2>
        </div>
        <div class="card-body py-5">
            <form method="post" action="{{ route('admin.profile.update') }}" class="admin-form js-form-spin"
                  novalidate>
                @csrf
                @method('PATCH')
                <input type="hidden" name="form-type" value="pass-change">
                <div class="row mb-4">
                    <div class="col-sm-3 offset-sm-2">
                        <button type="button" class="btn btn-darken btn-sm"
                                id="password-generate">{{ __('admin.form.btn.generate_pass') }}</button>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="password" class="col-sm-2 col-form-label">{{ __('admin.form.password') }} <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div
                            class="form-text">{{ config('admin.strong_passwords') ? __('admin.form.help_text.pass_min_strong'):__('admin.form.help_text.pass_min') }}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="password_confirmation"
                           class="col-sm-2 col-form-label">{{ __('admin.form.password_confirmation') }}
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3 offset-sm-2">
                        <button type="submit" class="btn btn-cta">{{ __('admin.form.btn.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>



@endsection
