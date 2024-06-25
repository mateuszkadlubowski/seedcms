<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    // use MenuTrait;

//    private const PAGINATION = 50;
//    const ORDER_FIELD = ['username', 'email', 'created_at'];


    public function __construct()
    {

    }

    public function index(User $user): View
    {

        $users = $user::select(['id', 'username', 'email', 'email_verified_at', 'created_at', 'last_login'])->get();




        return view('admin.users.list', ['users' => $users]);
//        if ($request->has('orderby')) {
//            $orderBy = $request->input('orderby');
//            if (in_array($orderBy, self::ORDER_FIELD)) {
//                if ($request->input('order') == 'desc') {
//                    $usersQuery->orderByDesc($orderBy);
//                } else {
//                    $usersQuery->orderBy($orderBy);
//                }
//
//            }
//        }
//        $users = $usersQuery->paginate(self::PAGINATION)->all();
//        return view('admin.users.list', ['users' => $users]);


//        if ($request->has('tab') && $request->input('tab') != 'all') {
//            $tab = $request->input('tab');
//            $users = $usersQuery->where('role', $tab);
//        }
//
//        $countQuery = DB::table('users')->select(DB::raw('COUNT(*) AS roleCount, role'))->groupBy('role');
//        if ($request->has('search')) {
//            $search = $request->input('search');
//            $users = $usersQuery->whereRaw('(name like "%' . $search . '%" OR email like "%' . $search . '%" )');
//            $count = $countQuery->whereRaw('(name like "%' . $search . '%" OR email like "%' . $search . '%" )');
//        }
//
//        $users = $usersQuery->paginate(static::PAGINATION);
//        $count = $countQuery->get();
//        $countTab = ['all' => 0];
//        foreach ($count as $item) {
//            $countTab['all'] += $item->roleCount;
//            $countTab[$item->role] = $item->roleCount;
//        }
//
//        foreach ($users as $item) {
//            $item->created_at = Carbon::parse($item->created_at)->format(config('app.datetime_format'));
//        }
//
//
//        return view('admin.users.list', [
//            'users' => $users,
//            'countTab' => $countTab,
//            'orderby' => $orderBy ?? null,
//            'order' => ($order == 'asc') ? 'desc' : 'asc',
//            'tab' => $tab ?? 'all',
//            'search' => $search ?? null
//        ]);

    }

    public function create(UserCreateForm $userCreateForm): View
    {
        return view('admin.users.create', ['schema' => $userCreateForm->getSchema()]);
    }

    public function store(Request $request)
    {
//        $data = $request->validate([
//            'name' => ['required', 'max:255'],
//            'email' => ['required', 'max:255', 'email', Rule::unique('users')],
//            'first_name' => ['nullable', 'alpha', 'max:50'],
//            'last_name' => ['nullable', 'alpha', 'max:50'],
//            'avatar' => ['nullable', 'file', 'image'],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//            'admin_note' => ['max:200'],
//        ]);
//        $id = DB::table('users')->insert($data);
////        @todo Dodać wybór roli dla użytkownika podczas dodawania oraz podczas edycji
//        if ($id) {
//            return redirect()->route('admin.user.list')->with('success', 'Dodano użytkownika: ' . $data['name']);
//        }
//        return back()->withInput();
    }

    public function edit(int $id = null): View
    {
//        $id = $id ?? Auth::id();
//        $user = DB::table('users')->find($id);
//        if (!$user) {
//            abort(404);
//        }
//
//        $email_verified_at = $user->email_verified_at ? Carbon::parse($user->email_verified_at)->format(config('app.datetime_format')) : null;
//
//        return view('admin.users.edit', [
//            'id' => $user->id,
//            'name' => $user->name,
//            'email' => $user->email,
//            'firstName' => $user->first_name,
//            'lastName' => $user->last_name,
//            'avatar' => $user->avatar,
//            'email_verified_at' => $email_verified_at,
//            'adminNote' => $user->admin_note,
//        ]);
    }

    public function update(Request $request)
    {

//
//        $formType = $request->input('form_type');
//        $userId = (int)$request->input('id');
//
//        switch ($formType) {
//            case 'basic-info':
//                $data = $request->validate([
//                    'id' => ['required', 'numeric'],
//                    'name' => ['required', 'max:255'],
//                    'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($userId)],
//                    'first_name' => ['nullable', 'alpha', 'max:50'],
//                    'last_name' => ['nullable', 'alpha', 'max:50'],
//                    'avatar' => ['nullable', 'file', 'image'],
//                ]);
//                $user = User::select()->find($data['id']);
//
//                if ($request->has('delete_avatar')) {
//                    Storage::delete($user->avatar);
//                    $data['avatar'] = null;
//                }
//
//                if ($data['email'] != $user->email) {
//                    $data['email_verified_at'] = null;
//                    //  Auth::user()->email = $data['email'];
//                    $user->sendEmailVerificationNotification();
//                    $request->session()->flash('warning', __('validation.alert.email_verify', ['email' => $data['email']]));
//                }
//
//                if ($request->hasFile('avatar')) {
//                    $file = $request->file('avatar');
//                    $fileName = $data['id'] . '.' . $file->extension();
//                    $data['avatar'] = $file->storeAs('avatars', $fileName);
//                }
//
//                break;
//            case 'pass-change':
//                $data = $request->validate([
//                    'id' => ['required', 'numeric'],
//                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
//                ]);
//                $data['password'] = Hash::make($data['password']);
//
//                break;
//            case 'admin-note':
//                $data = $request->validate([
//                    'id' => ['required', 'numeric'],
//                    'admin_note' => ['max:200'],
//                ]);
//                break;
//            default:
//                return redirect(route('admin.user.edit', ['id' => $userId]))->with('error', __('admin.form.info_msg.save_fail'));
//        }
//
//
//        //DB::table('users')->where('id', $data['id'])->update($data);
//        DB::table('users')->where('id', $data['id'])->update($data);
//        return redirect(route('admin.user.edit', ['id' => $data['id']]))->with('success', __('admin.form.info_msg.save_success'));
//
    }

    public function destroy()
    {

    }

    public function verifyEmailSend(int $id, Request $request)
    {
//        $user = User::select()->find($id);
//        if (!$user) {
//            abort(404);
//        }
//        if (!$user->email_verified_at) {
//            $user->sendEmailVerificationNotification();
//            $request->session()->flash('success', __('admin.form.info_msg.sent_verify_email', ['email' => $user->email]));
//        } else {
//            $request->session()->flash('error', __('admin.form.info_msg.verify_email_fail', ['email' => $user->email]));
//        }
//        return back()->with(['id' => $user->id]);
    }

    public function passChangeSend(int $id, Request $request)
    {
//        $user = User::select()->find($id);
//        if (!$user) {
//            abort(404);
//        }
//        if ($user->email) {
//            $token = Str::random(64);
//            DB::table('password_resets')->updateOrInsert(
//                ['email' => $user->email], ['token' => bcrypt($token), 'created_at' => now()]
//            );
//            $user->sendPasswordResetNotification($token);
//            $request->session()->flash('success', __('admin.form.info_msg.sent_pass_reset', ['email' => $user->email]));
//        } else {
//            $request->session()->flash('error', __('admin.form.info_msg.pass_reset_fail'));
//        }
//        return back()->with(['id' => $user->id]);
    }
}
