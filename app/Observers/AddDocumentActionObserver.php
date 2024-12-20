<?php

namespace App\Observers;

use App\Models\AddDocument;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AddDocumentActionObserver
{
    public function created(AddDocument $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'AddDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(AddDocument $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'AddDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(AddDocument $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'AddDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }
}
