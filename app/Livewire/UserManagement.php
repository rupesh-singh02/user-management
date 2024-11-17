<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public $users, $roles, $logs, $last_user, $name, $email, $password, $contact_no, $userId, $deleteUserId, $role_id = '', $status = '';

    public $showNotification = false;
    public $confirmDelete = false;
    public $showEditModal = false;

    public $notificationTitle = '';
    public $notificationMessage = '';

    public $editUserId, $editName, $editEmail, $editContact, $editRole, $editStatus;

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
                'password' => bcrypt($this->password),
                'contact_no' => $this->contact_no,
                'role_id' => $this->role_id,
                'status' => $this->status,
            ];


            $user = User::create($userData);

            $this->createLog($user, 'User Created', 'New user created successfully');

            $this->resetFields();

            $this->notify('Success', 'User created successfully!');
        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->all();
            $this->notify('Error', implode("\n", $errorMessages));
        } catch (\Exception $e) {
            // dd($e);
            $this->notify('Error', 'An error occurred while creating the user. Please try again!');
        }
    }

    public function viewUser($id)
    {
        $user = User::findOrFail($id);

        $this->editUserId = $user->id;
        $this->editName = $user->name;
        $this->editEmail = $user->email;
        $this->editContact = $user->contact_no;
        $this->editRole = $user->role_id;
        $this->editStatus = $user->status;

        $this->showEditModal = true;
    }

    public function updateUser()
    {
        try {
            $user = User::findOrFail($this->editUserId);

            $user->update([
                'name' => $this->editName,
                'email' => $this->editEmail,
                'contact_no' => $this->editContact,
                'role_id' => $this->editRole,
                'status' => $this->editStatus,
            ]);

            $this->createLog($user, 'User Updated', 'User updated successfully!');

            $this->showEditModal = false;

            $this->notify('Success', 'User updated successfully!');

        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors()->all();
            $this->notify('Error', implode("\n", $errorMessages));
        } catch (\Exception $e) {
            // dd($e);
            $this->notify('Error', 'An error occurred while saving the user. Please try again!');
        }
    }

    public function deleteUser()
    {
        if ($this->deleteUserId) {

            try {
                $user = User::findOrFail($this->deleteUserId);
                $this->createLog($user, 'User Deleted', 'User deleted successfully');
                $user->delete();
                $this->notify('Success', 'User deleted successfully!');
            } catch (\Exception $e) {
                $this->notify('Error', 'An error occurred while deleting the user. Please try again!');
            } finally {
                $this->confirmDelete = false;
            }
        }
    }

    public function askDeleteConfirmation($userId)
    {
        $this->deleteUserId = $userId;
        $this->confirmDelete = true;
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
        $this->notificationMessage = nl2br($message);
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
