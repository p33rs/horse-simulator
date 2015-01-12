<?php

use horse\response\JsonResponse;
class UserController extends BaseController {

    public function create()
    {
        /** @var cram\validators\ValidatorLocator $validators */
        $validators = App::make('cram\Validation');
        $data = Input::all();
        /** @var cram\validators\SignupValidator $validator */
        $errors = $validators->get('Signup', $data)->errors();
        if ($errors->count()) {
            return JsonResponse::validation($errors);
        }
        unset($data['password2']);
        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();
        Auth::login($user);
        return JsonResponse::success(Auth::user());
    }

    public function index()
    {
        return JsonResponse::success(Horse::all());
    }

    public function view($id)
    {
        try {
            $horse = Horse::findOrFail($id);
        } catch (\ModelNotFoundException $e) {
            return JsonResponse::error('Horse not found', 404);
        }
        return JsonResponse::success($horse);
    }

    public function delete($id)
    {
        try {
            $horse = Horse::findOrFail($id);
        } catch (\ModelNotFoundException $e) {
            return JsonResponse::error('Horse not found', 404);
        }
        $horse->delete();
        return JsonResponse::success();
    }

    public function update($id)
    {
        $user = Auth::user();
        if (!Request::isMethod('post')) {
            return View::make('user/account')->with('user', $user);
        }
        $data = Input::all();
        /** @var cram\validators\ValidatorLocator $validators */
        $validators = App::make('cram\Validation');
        /** @var cram\validators\SignupValidator $validator */
        $errors = $validators->get('Account', $data, ['id' => $user->id])->errors();
        $user->email = Input::get('email');
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        if (Input::get('password')) {
            $user->password = Hash::make($data['password']);
        }
        if (!$errors->count()) {
            $user->save();
            Session::set('message', 'Account updated');
        }
        return View::make('user/account')
            ->with('user', $user)
            ->with('errors', $errors);
    }

    public function like($id)
    {
        try {
            $horse = Horse::findOrFail($id);
        } catch (\ModelNotFoundException $e) {
            return JsonResponse::error('Horse not found', 404);
        }
        $horse->increment('likes');
        return JsonResponse::success();
    }

    public function login()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        $remember = Input::get('remember');
        $error = '';
        if (!$username) {
            $error = 'Please enter your username.';
        } elseif (!$password) {
            $error = 'Please enter your password.';
        } elseif (!Auth::check() && !Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            $error = 'An invalid username or password was provided.';
        }
        return $error ? JsonResponse::error($error) : JsonResponse::success(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return JsonResponse::success();
    }

}
