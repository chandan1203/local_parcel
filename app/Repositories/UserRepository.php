<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**      
     * @var Model      
     */
    protected $user;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create($data)
    {

        User::create([
            'phone' => $data['phone'],
            'role' => 2,
            'password' => Hash::make($data['password']),
        ]);
        return "success";
    }
}
