<?php

namespace Mahmud\GglinkTest\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mahmud\GglinkTest\ApiException;
use Mahmud\GglinkTest\Repository\UserRepository;

class UserController extends Controller
{
    private $userRepo;
    public function __construct(UserRepository  $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * get profile user
     */
    public function show()
    {
        try {
            $user = $this->userRepo->show();
            return view('pages::user_show', compact('user'));
        } catch (ApiException $exception) {
            return redirect()->back();
        }
    }

    /**
     * render user crete page
     */
    public function create()
    {
        return view('pages::user_create');
    }

    /**
     * add a user
     * validate the inputs
     * if passed then go to repository for add operation
     */
    public function store(Request $request)
    {
        // validation
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            return view('pages::user_create', compact('errors'));
        }

        $formData = $request->all(); // get data passed form view (blade file)
        $errors = [];
        try {
            $result = $this->userRepo->store($formData);
            return redirect()->back();
        } catch (ApiException $exception) {
            return view('pages::user_create', compact('errors'));
        }
    }

    /**
     * render user edit page
     */
    public function edit()
    {
        $errors = [];
        try {
            $user = $this->userRepo->show();
            return view('pages::user_edit', compact('user', 'errors'));
        } catch (ApiException $exception) {
            return view('pages::user_edit', compact('errors'));
        }
    }

    /**
     * update an user profile
     */
    public function update(Request $request)
    {
        // validation
        $validator = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            return view('pages::user_update', compact('errors'));
        }

        $formData = $request->all(); // get data passed form view (blade file)

        try {
            $result = $this->userRepo->update($formData);
            return redirect()->back();
        } catch (ApiException $exception) {
            $errors = [];
            return view('pages::user_update', compact('errors'));
        }
    }

    /**
     * delete an user
     */
    public function destroy(Request $request)
    {
        $formData = $request->all(); // get data passed form view (blade file)

        try {
            $result = $this->userRepo->destory($formData);
            return redirect()->back();
        } catch (ApiException $exception) {
            $errors = [];
            return view('pages::user_create', compact('errors'));
        }
    }
}
