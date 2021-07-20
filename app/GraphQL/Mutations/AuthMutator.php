<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function login($rootValue, array $args)
    {
        $credentials = Arr::only($args, ['email', 'password']);

        if(Auth::once($credentials)){
            $token = Auth::user()->createToken('');
            return $token->plainTextToken;
        }

        return null;
    }
}
