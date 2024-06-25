@extends("admin.layout")

@section("title",  __('admin.users.menu.create'))

@section("content")
    <section class="card card-section">
        <div class="card-body py-5">
            <x-form :schema="$schema" action="{{ route('admin.users.store') }}" class="admin-form js-form-spin"
                    method="post"/>
        </div>
    </section>
@endsection
