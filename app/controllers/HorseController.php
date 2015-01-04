<?php

use horse\response\JsonResponse;
class HorseController extends BaseController {

    public function create()
    {
        $data = Input::all();
        /** @var horse\validators\ValidatorLocator $validators */
        $validators = App::make('horse\Validation');
        /** @var horse\validators\HorseValidator $validator */
        $errors = $validators->get('Horse', $data)->errors();

        if ($errors->count()) {
            return JsonResponse::validation($errors);
        }
        return JsonResponse::success(
            Horse::create([
                'name' => Input::get('name'),
                'occupation' => Input::get('occpuation')?:'',
                'bio' => Input::get('bio')?:'',
            ])
        );
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
        try {
            $horse = Horse::findOrFail($id)->fill(Input::all());
        } catch (\ModelNotFoundException $e) {
            return JsonResponse::error('Horse not found', 404);
        }
        /** @var horse\validators\ValidatorLocator $validators */
        $validators = App::make('horse\Validation');
        /** @var horse\validators\HorseValidator $validator */
        $errors = $validators->get('Horse', $horse->toArray())->errors();

        if ($errors->count()) {
            return JsonResponse::validation($errors);
        }
        $horse->save();
        return JsonResponse::success();
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

}
