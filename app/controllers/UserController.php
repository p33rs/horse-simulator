<?php

use horse\response\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        return JsonResponse::success(User::all());
    }

    public function view($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return JsonResponse::error('User not found', 404);
        }
        return JsonResponse::success($user);
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return JsonResponse::error('User not found', 404);
        }
        $user->delete();
        return JsonResponse::success();
    }

    public function update($id)
    {
        try {
            $user = User::findOrFail($id)->fill(Input::all());
        } catch (ModelNotFoundException $e) {
            return JsonResponse::error('User not found', 404);
        }
        /** @var horse\validators\ValidatorLocator $validators */
        $validators = App::make('user\Validation');
        /** @var horse\validators\UserValidator $validator */
        $errors = $validators->get('User', $user->toArray())->errors();

        if ($errors->count()) {
            return JsonResponse::validation($errors);
        }
        if (Input::get('password')) {
            $user->password = Hash::make(Input::get('password'));
        }
        $user->save();
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
