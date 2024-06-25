<table class="table admin-table">
    <thead>
    <tr>
        <th><input form="multiple-edit-form" class="form-check-input" type="checkbox" id="select-all"
                   value="all"></th>
        @foreach($columns as $column)
            <th scope="col">{{ __('admin.users.table.'.$column) }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($users ?? [] as $user)
        <tr>
            <td>
                <input form="multiple-edit-form" class="form-check-input" type="checkbox" name="id[]"
                       value="{{ $user->id }}">
            </td>
            <td class="col-users">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="user-link"
                   title="{{ __('admin.panel.edit') }}">
                    {{ $user->username }}</a>
                <button class="menu-more-btn" data-bs-toggle="dropdown"
                        title="{{ __('admin.users.more_menu') }}"></button>
                <div class="menu-more dropdown-menu">
                    <ul>
                        <li><a href="{{ route('admin.users.edit', $user->id) }}"
                               class="icon-edit">{{ __('admin.panel.edit') }}</a></li>
                        <li><a href="{{ route('admin.users.delete', $user->id) }}"
                               class="icon-delete">{{ __('admin.panel.delete') }}</a></li>
                    </ul>
                </div>
            </td>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
            <td>do uzupełnienia</td>
            <td>{{ $user->last_login ? $user->last_login->format('d.m.Y H:i'): __('admin.panel.never') }}</td>
            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
            <td>{{ $user->email_verified_at ? __('admin.panel.yes') : __('admin.panel.no') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
