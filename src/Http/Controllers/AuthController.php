<?php

namespace Mahmud\GglinkTest\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mahmud\GglinkTest\ApiException;
use Mahmud\GglinkTest\Repository\AuthRepository;

class AuthController extends Controller
{
    private $authRepo;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepo = $authRepository;
    }

    /*
     * validate the inputs
     * call the repository
     */
    public function login(Request $request)
    {
        // validation
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            return view('pages::index', compact('errors'));
        }

        $formData = $request->all();

        try {
            $result = $this->authRepo->login($formData);
            return redirect()->route('user.show');
        } catch (ApiException $exception) {
            $serverError = 'Something went wrong';
            return view('pages::index', compact('serverError'));
        }
    }

    /*
     * logout function
     * api end point is not found so couldn't integrate
     */
    public function logout()
    {
        session()->forget('X-Token');
        return redirect()->route('index');
    }
}
