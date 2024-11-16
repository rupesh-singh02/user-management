<?php

namespace App\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $users, $name, $email, $password, $contact_no, $status = '', $userId;
    public $showNotification = false; // Controls modal visibility
    public $notificationTitle = '';
    public $notificationMessage = '';

    public function render()
    {
        $this->users = User::all();
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
            ]);

            $userData = [
                'name' => $this->name,
                'email' => $this->email,
                'contact_no' => $this->contact_no,
                'status' => $this->status,
            ];

            if ($this->password) {
                $userData['password'] = bcrypt($this->password);
            }

            User::updateOrCreate(
                ['id' => $this->userId],
                $userData
            );

            $this->resetFields();

            $this->notify('Success', 'User saved successfully!');
        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->all();
            $this->notify('Validation Error', implode("\n", $errorMessages));
        } catch (\Exception $e) {
            $this->notify('Error', 'An error occurred while saving the user. Please try again!');
        }
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
        $this->status = '';
    }
}
