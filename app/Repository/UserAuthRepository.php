<?php

namespace App\Repository;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use App\Interfaces\UserAuthInterface;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserAuthRepository implements UserAuthInterface
{
    use ApiResponser;
    public function store(array $params)
    {
        try {
            $input = $params;
            $input['password'] = Hash::make($input['password']);
            // Create the user
            $user = User::create($input);
            // Dynamically set the auth provider for 'user'
            config(['auth.guards.api.provider' => 'user']);
            // Generate a Passport token for the user
            $token = $user->createToken('MyApp', ['user'])->accessToken;
            // Return success response with token
            return $this->successResponse([
                'token' => $token,
            ], 'User Registered Successfully', 200);
        } catch (\Exception $e) {
            // Return a generic error response in case of failure
            return $this->errorResponse($e->getMessage(), 500);
        }
    }


    public function login(array $params)
    {
        try {
            // Find the user by email
            $user = User::where('email', $params['email'])->first();

            // If the user doesn't exist, return an error response
            if (!$user) {
                return $this->errorResponse('Invalid login credentials.', 422);
            }

            // If the password doesn't match, return an error response
            if (!Hash::check($params['password'], $user->password)) {
                return $this->errorResponse('Password Mismatch.', 400);
            }

            // If the user's status is not active, return an error response
            if ($user->status !== 'ACTIVE') {
                return $this->errorResponse('User access not allowed due to inactive status.', 422);
            }

            // Dynamically set the auth provider to 'user'
            config(['auth.guards.api.provider' => 'user']);

            // Generate the Passport token for the user with the correct scope
            $token = $user->createToken('MyApp', ['user'])->accessToken;

            // Return the success response using the trait
            return $this->successResponse([
                'user' => new ResourcesUser($user),
                'token' => $token,
            ], 'User Logged in Successfully');
        } catch (Exception $e) {
            // Catch any exceptions and return a general error response
            return $this->errorResponse($e->getMessage(), 422);
        }
    }


    public function logout(array $params)
    {
        try {
            // Get the currently authenticated user
            $user = auth()->guard('user')->user();

            // If there's no authenticated user, return an error response
            if (!$user) {
                return $this->errorResponse('User not authenticated.', 401);
            }

            // If you want to revoke a specific token based on the params, you can use this:
            // If the token ID is passed in $params, revoke the specific token.
            if (isset($params['token_id'])) {
                // Find the token by ID (you can adjust this if you store tokens differently)
                $token = $user->tokens->find($params['token_id']);
                if ($token) {
                    $token->revoke();
                }
            } else {
                // Revoke the current token
                $user->token()->revoke();
            }

            // If you are storing the token in a cookie, forget the token cookie
            $cookie = \Cookie::forget('_token'); // Change '_token' if you're using a different cookie name

            // Return a success response with the cookie removal
            return $this->successResponse(null, 'User Logged out successfully.', 200)->withCookie($cookie);
        } catch (\Exception $e) {
            // Handle any exception that occurs during logout
            return $this->errorResponse('An error occurred during logout.', 500, [
                'error' => $e->getMessage(),
            ]);
        }
    }



    public function show() {}

    public function update(array $parms, $user) {}
}
