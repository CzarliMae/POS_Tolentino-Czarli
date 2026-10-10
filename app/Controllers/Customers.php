<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            [
                'full_name' => 'Eros Piamonte',
                'email' => 'eros.piamonte@example.com',
                'phone' => '09171234567',
            ],
            [
                'full_name' => 'Cy Cedric ',
                'email' => 'cy.cedric@example.com',
                'phone' => '09181234567',
            ],
            [
                'full_name' => 'Ced Nathan ',
                'email' => 'ced.nathan@example.com',
                'phone' => '09191234567',
            ],
            [
                'full_name' => 'Nathan Garcia',
                'email' => 'nathan.garcia@example.com',
                'phone' => '09201234567',
            ],
            [
                'full_name' => 'Prince Velarde',
                'email' => 'prince.velarde@example.com',
                'phone' => '09211234567',
            ],
        ];

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customers,
        ]);
    }
}
