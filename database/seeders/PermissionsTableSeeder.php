<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'manage_document_access',
            ],
            [
                'id'    => 18,
                'title' => 'add_document_create',
            ],
            [
                'id'    => 19,
                'title' => 'add_document_edit',
            ],
            [
                'id'    => 20,
                'title' => 'add_document_show',
            ],
            [
                'id'    => 21,
                'title' => 'add_document_delete',
            ],
            [
                'id'    => 22,
                'title' => 'add_document_access',
            ],
            [
                'id'    => 23,
                'title' => 'type_create',
            ],
            [
                'id'    => 24,
                'title' => 'type_edit',
            ],
            [
                'id'    => 25,
                'title' => 'type_show',
            ],
            [
                'id'    => 26,
                'title' => 'type_delete',
            ],
            [
                'id'    => 27,
                'title' => 'type_access',
            ],
            [
                'id'    => 28,
                'title' => 'manage_content_access',
            ],
            [
                'id'    => 29,
                'title' => 'logo_create',
            ],
            [
                'id'    => 30,
                'title' => 'logo_edit',
            ],
            [
                'id'    => 31,
                'title' => 'logo_show',
            ],
            [
                'id'    => 32,
                'title' => 'logo_delete',
            ],
            [
                'id'    => 33,
                'title' => 'logo_access',
            ],
            [
                'id'    => 34,
                'title' => 'image_type_create',
            ],
            [
                'id'    => 35,
                'title' => 'image_type_edit',
            ],
            [
                'id'    => 36,
                'title' => 'image_type_show',
            ],
            [
                'id'    => 37,
                'title' => 'image_type_delete',
            ],
            [
                'id'    => 38,
                'title' => 'image_type_access',
            ],
            [
                'id'    => 39,
                'title' => 'content_type_create',
            ],
            [
                'id'    => 40,
                'title' => 'content_type_edit',
            ],
            [
                'id'    => 41,
                'title' => 'content_type_show',
            ],
            [
                'id'    => 42,
                'title' => 'content_type_delete',
            ],
            [
                'id'    => 43,
                'title' => 'content_type_access',
            ],
            [
                'id'    => 44,
                'title' => 'add_content_create',
            ],
            [
                'id'    => 45,
                'title' => 'add_content_edit',
            ],
            [
                'id'    => 46,
                'title' => 'add_content_show',
            ],
            [
                'id'    => 47,
                'title' => 'add_content_delete',
            ],
            [
                'id'    => 48,
                'title' => 'add_content_access',
            ],
            [
                'id'    => 49,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 50,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 51,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 52,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
