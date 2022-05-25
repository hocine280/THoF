<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rule;
use App\Models\Utilisateur\Role;
use App\Models\Utilisateur\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Utilisateur\User
     */
    public function create(array $input)
    {

        $code_secret = $input['code_secret']; 
        $code_etudiant = Role::find(1); 
        $code_prof = Role::find(2); 
        $code_admin = Role::find(3); 
        $code_ext = Role::find(4); 

        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'code_secret' => ['required', 'numeric', 'digits_between:5,7', 
                Rule::in([$code_etudiant->code_role, $code_prof->code_role, $code_ext->code_role, $code_admin->code_role, $code_ext->code_role]), 
            ], 
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        $role_id =0; 
        if($code_secret == $code_etudiant->code_role){
            $role_id = 1; 
        }else if($code_secret == $code_prof->code_role){
            $role_id = 2; 
        }else if($code_secret == $code_admin->code_role){
            $role_id = 3; 
        }else if($code_secret == $code_ext->code_role){
            $role_id = 4; 
        }

        return User::create([
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $role_id, 
        ]);; 
    }
}
