@extends("admin.layout")

@section("title", __('admin.users.menu.list'))

@section("content")
    <section class="card card-section">
        <a href="{{ route('admin.users.create') }}"
           class="btn btn-cta icon-user-add btn-sm">{{ __('admin.users.btn.add') }}</a>
        <div class="card-body py-5">

            <x-admin.table-admin :items="$users" translationKey="admin.users.table"/>
        </div>
    </section>





    {{--   <section class="card admin-section users-list">--}}
    {{--       <div class="card-body">--}}
    {{--           <div class="admin-table-filter">--}}
    {{--               <div class="filter-tabs">--}}
    {{--                   --}}{{--                    @foreach($countTab as $key => $val)--}}
    {{--                   --}}{{--                        <a href="{{ route('admin.user.list') }}?tab={{$key}}{{ $search ? '&search='.$search :  '' }}"--}}
    {{--                   --}}{{--                           @if ($tab==$key) class="active" @endif><span>{{ __('admin.user_roles.'.$key) }}</span>--}}
    {{--                   --}}{{--                            ({{ $val }})</a>--}}
    {{--                   --}}{{--                    @endforeach--}}
    {{--               </div>--}}
    {{--               <div class="filter-search">--}}
    {{--                   <button type="button" class="btn btn-sm btn-darken icon-filter"--}}
    {{--                           id="filter-btn">{{ __('admin.panel.filter_btn') }}--}}
    {{--                   </button>--}}
    {{--                   <form action="" method="get">--}}
    {{--                       <label class="visually-hidden" for="search">{{ __('admin.panel.search') }}</label>--}}
    {{--                       <input type="search" class="form-control form-control-sm" id="search" name="search"--}}
    {{--                              placeholder="{{ __('admin.panel.search') }}" value="{{ $search }}">--}}
    {{--                       <button type="submit" class="btn btn-darken btn-sm" aria-label="{{ __('admin.panel.search') }}">--}}
    {{--                           <i class="fa-solid fa-magnifying-glass"></i></button>--}}
    {{--                   </form>--}}
    {{--               </div>--}}
    {{--           </div>--}}
    {{--           {{ $orderby = '' }}--}}
    {{--           {{ $search = '' }}--}}
    {{--           {{ $tab = '' }}--}}



    {{--                   </th>--}}
    {{--                   {{ ($orderby=='name') ? $order : '' }}--}}
    {{--                   ?orderby=name&order={{ ($orderby=='name') ? $order : 'asc' }}{{ $search ? '&search='.$search :  '' }}{{ $tab != 'all' ? '&tab='.$tab :  '' }}--}}
    {{--                   <th scope="col" class="username-col orderby"><a--}}
    {{--                           href="{{ route('admin.users.list') }}"></a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="username-col orderby"><a--}}
    {{--                           href="{{ route('admin.users.list') }}">{{ __('admin.users.table_head.email') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="username-col orderby"><a--}}
    {{--                           href="{{ route('admin.users.list') }}">{{ __('admin.users.table_head.email_verified_at') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="username-col orderby"><a--}}
    {{--                           href="{{ route('admin.users.list') }}">{{ __('admin.users.table_head.created_at') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col orderby {{ ($orderby=='email') ? $order : '' }}"><a--}}
    {{--                           href="{{ route('admin.users.list') }}?orderby=email&order={{ ($orderby=='email') ? $order : 'asc' }}{{ $search ? '&search='.$search :  '' }}{{ $tab != 'all' ? '&tab='.$tab :  '' }}">{{ __('admin.users.table_head.email') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col"><span>{{ __('admin.users.table_head.group') }}</span>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col"><span>{{ __('admin.users.table_head.role') }}</span>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col"><span>{{ __('admin.users.table_head.email_verified_at') }}</span>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col orderby {{ ($orderby=='status') ? $order : '' }}"><a--}}
    {{--                           href="{{ route('admin.users.list') }}?orderby=status&order={{ ($orderby=='status') ? $order : 'asc' }}{{ $search ? '&search='.$search :  '' }}{{ $tab != 'all' ? '&tab='.$tab :  '' }}">{{ __('admin.users.table_head.status') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col orderby {{ ($orderby=='last_log') ? $order : '' }}"><a--}}
    {{--                           href="{{ route('admin.users.list') }}?orderby=last_log&order={{ ($orderby=='last_log') ? $order : 'asc' }}{{ $search ? '&search='.$search :  '' }}{{ $tab != 'all' ? '&tab='.$tab :  '' }}">{{ __('admin.users.table_head.last_log') }}</a>--}}
    {{--                   </th>--}}
    {{--                   <th scope="col" class="col orderby {{ ($orderby=='created_at') ? $order : '' }}"><a--}}
    {{--                           href="{{ route('admin.users.list') }}?orderby=created_at&order={{ ($orderby=='created_at') ? $order : 'asc' }}{{ $search ? '&search='.$search :  '' }}{{ $tab != 'all' ? '&tab='.$tab :  '' }}">{{ __('admin.users.table_head.created_at') }}</a>--}}
    {{--                   </th>--}}
    {{--               </tr>--}}
    {{--               </thead>--}}
    {{--               <tbody>--}}

    {{--               </tbody>--}}
    {{--           </table>--}}

    {{--       </div>--}}
    {{--   </section>--}}





    {{--            <div class="admin-table-footer">--}}
    {{--                <form action="{{ route('admin.user.edit') }}" id="multiple-edit-form">--}}
    {{--                    <select class="form-select form-select-sm form-control-sm"--}}
    {{--                            aria-label="{{ __('admin.panel.mass_actions_select') }}">--}}
    {{--                        <option>{{ __('admin.panel.mass_actions_select') }}</option>--}}
    {{--                        <option value="delete">Usuń</option>--}}
    {{--                        <option value="2">Two</option>--}}
    {{--                        <option value="3">Three</option>--}}
    {{--                    </select>--}}
    {{--                    <button type="submit"--}}
    {{--                            class="btn btn-sm btn-darken">{{ __('admin.panel.mass_actions_btn') }}</button>--}}
    {{--                </form>--}}

    {{--                {{ $users->links() }}--}}
    {{--            </div>--}}


    {{--    </section>--}}
@endsection
