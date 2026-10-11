<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    // Display all users
    public function index(): string
    {
        return view('users/index', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => (new UserModel())->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    // Display new user form
    public function newForm(): string
    {
        return view('users/new', [
            'title' => 'New User',
            'activePage' => 'users',
        ]);
    }

    // Save new user
    public function store()
    {
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(site_url('users/new'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        (new UserModel())->insert([
            'username' => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
            'avatar' => null,
        ]);

        return redirect()->to(site_url('users'))
            ->with('message', 'User account created successfully.');
    }

    // Display edit user form
    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'activePage' => 'users',
            'user' => $user,
        ]);
    }

    // Update user and process avatar upload
    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username' => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
        ];

        $file = $this->request->getFile('avatar');

        // Validate an avatar only when a file was submitted
        if ($file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]';
        }

        if (! $this->validate($rules)) {
            return redirect()->to(site_url("users/{$id}/edit"))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
        ];

        // Process and resize uploaded avatar
        if ($file !== null && $file->isValid() && ! $file->hasMoved()) {
            $directory = FCPATH . 'uploads/avatars/';

            if (! is_dir($directory)
                && ! mkdir($directory, 0755, true)
                && ! is_dir($directory)) {
                return redirect()->to(site_url("users/{$id}/edit"))
                    ->withInput()
                    ->with('errors', [
                        'avatar' => 'Unable to create the upload folder.',
                    ]);
            }

            $filename = bin2hex(random_bytes(16)) . '.jpg';
            $destination = $directory . $filename;

            try {
                service('image')
                    ->withFile($file->getTempName())
                    ->fit(300, 300, 'center')
                    ->convert(IMAGETYPE_JPEG)
                    ->save($destination, 85);

                $data['avatar'] = $filename;

            } catch (\Throwable $e) {
                log_message(
                    'error',
                    'Avatar processing failed: ' . $e->getMessage()
                );

                return redirect()->to(site_url("users/{$id}/edit"))
                    ->withInput()
                    ->with('errors', [
                        'avatar' => 'Unable to process the uploaded image.',
                    ]);
            }
        }

        // Update the database record
        $userModel->update($id, $data);

        return redirect()->to(site_url('users'))
            ->with('message', 'User account updated successfully.');
    }
}
