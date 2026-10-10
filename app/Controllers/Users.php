<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Sean',
                'role' => 'Administrator',
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Kale',
                'role' => 'Cashier',
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Joyce',
                'role' => 'Manager',
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Adrian',
                'role' => 'Cashier',
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Jayrus',
                'role' => 'Sales Associate',
            ],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => $users,
        ]);
    }
}
