<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $users, $roles, $logs, $last_user, $name, $email, $password, $contact_no, $role_id = '', $status = '', $userId;
    public $showNotification = false; 
    public $notificationTitle = '';
    public $notificationMessage = '';

    public function render()
    {
        $this->users = User::all();
        $this->roles = Role::all();
        $this->last_user = User::with('role')->latest()->first();
        $this->logs = Log::latest()->limit(6)->get();

        return view('livewire.user-management')->layout('layouts/app');
    }

    public function store()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $this->userId,
                'password' => 'nullable|min:8',
                'contact_no' => 'required|numeric|digits_between:10,15',
                'status' => 'required|in:0,1',
                'role_id' => 'required|exists:roles,id',
            ]);

            $userData = [
                'name' => $this->name,
                'email' => $this->email,
                'contact_no' => $this->contact_no,
                'role_id' => $this->role_id,
                'status' => $this->status,
            ];
            if ($this->password) {
                $userData['password'] = bcrypt($this->password);
            }

            if ($this->userId) {
                // Update existing user
                $user = User::findOrFail($this->userId);
                $user->update($userData);
                $this->createLog($user, 'User Updated', 'User details updated successfully');
            } else {
                // Create a new user
                $user = User::create($userData);
                $this->createLog($user, 'User Created', 'New user created successfully');
            }

            $this->resetFields();

            $this->notify('Success', 'User saved successfully!');
        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->all();
            $this->notify('Validation Error', implode("\n", $errorMessages));
        } catch (\Exception $e) {
            // dd($e);
            $this->notify('Error', 'An error occurred while saving the user. Please try again!');
        }
    }

    private function createLog($user, $action, $description)
    {
        Log::create([
            'user_id' => $user->id,
            'action' => $action,
            'description' => $description,
        ]);
    }

    public function notify($title, $message)
    {
        $this->notificationTitle = $title;
        $this->notificationMessage = nl2br($message); // Convert newlines to <br> for proper display
        $this->showNotification = true;
    }

    private function resetFields()
    {
        $this->userId = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->contact_no = '';
        $this->role_id = '';
        $this->status = '';
    }
}
