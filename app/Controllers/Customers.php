<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customerModel->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('customers/new', [
            'title' => 'New Customer',
            'activePage' => 'customers',
        ]);
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(site_url('customers/new'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        (new CustomerModel())->insert([
            'full_name' => trim($this->request->getPost('full_name')),
            'email' => trim($this->request->getPost('email')),
            'phone' => trim($this->request->getPost('phone') ?? '') ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('message', 'Customer account created successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if (! $customer) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('customers/edit', [
            'title' => 'Edit Customer',
            'activePage' => 'customers',
            'customer' => $customer,
        ]);
    }

    public function update(int $id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (! $customer) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(site_url("customers/{$id}/edit"))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, [
            'full_name' => trim($this->request->getPost('full_name')),
            'email' => trim($this->request->getPost('email')),
            'phone' => trim($this->request->getPost('phone') ?? '') ?: null,
        ]);

        return redirect()->to(site_url('customers'))
            ->with('message', 'Customer account updated successfully.');
    }
}
