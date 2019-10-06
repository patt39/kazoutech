<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create roles (Please don't delete this it's verry important !)

        Role::create(['guard_name' => 'web', 'name' => 'user']);
        Role::create(['guard_name' => 'web', 'name' => 'visitor']);
        Role::create(['guard_name' => 'web', 'name' => 'editor']);
        Role::create(['guard_name' => 'web', 'name' => 'advertiser']);
        Role::create(['guard_name' => 'web', 'name' => 'moderator']);
        Role::create(['guard_name' => 'web', 'name' => 'admin']);



        //Create permissions Dashboard
        Permission::create(['guard_name' => 'web' , 'name' => 'dashboard']);

        Permission::create(['guard_name' => 'web' , 'name' => 'auditing']);

        Permission::create(['guard_name' => 'web' , 'name' => 'activity']);

        Permission::create(['guard_name' => 'web' , 'name' => 'administration']);

        Permission::create(['guard_name' => 'web' , 'name' => 'setting-task']);

        //Create permissions Administrations
        Permission::create(['guard_name' => 'web' , 'name' => 'view-administrator']);
        Permission::create(['guard_name' => 'web' , 'name' => 'create-administrator']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-administrator']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-administrator']);



        // create permissions testimonials
        Permission::create(['guard_name' => 'web' , 'name' => 'create-testimonial']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-testimonial']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-testimonial']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-testimonial']);

        // create permissions testimonials
        Permission::create(['guard_name' => 'web' , 'name' => 'create-setting']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-setting']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-setting']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-setting']);

        // create permissions documentations
        Permission::create(['guard_name' => 'web' , 'name' => 'create-documentation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-documentation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-documentation']);

        //Create Permissions Legal Notice
        Permission::create(['guard_name' => 'web' , 'name' => 'create-legal']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-legal']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-legal']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-legal']);

        // create permissions categories
        Permission::create(['guard_name' => 'web' , 'name' => 'create-category']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-category']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-category']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-category']);

        //Create Permissions Faqs
        Permission::create(['guard_name' => 'web' , 'name' => 'create-faq']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-faq']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-faq']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-faq']);

        //Create Permissions Occupations
        Permission::create(['guard_name' => 'web' , 'name' => 'create-occupation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-occupation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-occupation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-occupation']);

        //Create Diplomas
        Permission::create(['guard_name' => 'web' , 'name' => 'create-diploma']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-diploma']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-diploma']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-diploma']);


        // create Aide & Contact Themes
        Permission::create(['guard_name' => 'web' , 'name' => 'create-aide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-aide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-aide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-aide']);

        // create permissions eventments
        Permission::create(['guard_name' => 'web' , 'name' => 'create-eventment']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-eventment']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-eventment']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-eventment']);


        // create permissions message-contacts
        Permission::create(['guard_name' => 'web' , 'name' => 'all-contact_message']);
        Permission::create(['guard_name' => 'web' , 'name' => 'view-contact_message']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-contact_message']);


        // create permissions conditions and utilisation
        Permission::create(['guard_name' => 'web' , 'name' => 'create-condition_utilisation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-condition_utilisation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-condition_utilisation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-condition_utilisation']);

        // create permissions abouts
        Permission::create(['guard_name' => 'web' , 'name' => 'create-about']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-about']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-about']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-about']);

        // create permissions tags
        Permission::create(['guard_name' => 'web' , 'name' => 'create-tag']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-tag']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-tag']);



        // create permissions presentations
        Permission::create(['guard_name' => 'web' , 'name' => 'create-presentation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-presentation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-presentation']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-presentation']);


        //Create permissions user
        Permission::create(['guard_name' => 'web' , 'name' => 'create-user']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-user']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-user']);
        Permission::create(['guard_name' => 'web' , 'name' => 'view-user']);

        // create permissions colors
        Permission::create(['guard_name' => 'web' , 'name' => 'create-color']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-color']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-color']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-color']);

        //Create permissions specialities
        Permission::create(['guard_name' => 'web' , 'name' => 'create-speciality']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-speciality']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-speciality']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-speciality']);

        //Create permissions works
        Permission::create(['guard_name' => 'web' , 'name' => 'create-work']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-work']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-work']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-work']);

        //Create permissions privacy
        Permission::create(['guard_name' => 'web' , 'name' => 'create-privacy']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-privacy']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-privacy']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-privacy']);

        //Create permissions roles
        Permission::create(['guard_name' => 'web' , 'name' => 'all-role']);
        Permission::create(['guard_name' => 'web' , 'name' => 'create-role']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-role']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-role']);

        //Create permissions roles
        Permission::create(['guard_name' => 'web' , 'name' => 'all-slide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'create-slide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-slide']);
        Permission::create(['guard_name' => 'web' , 'name' => 'publish-slide']);


        //Create permissions permissions
        Permission::create(['guard_name' => 'web' , 'name' => 'all-permission']);
        Permission::create(['guard_name' => 'web' , 'name' => 'create-permission']);
        Permission::create(['guard_name' => 'web' , 'name' => 'edit-permission']);
        Permission::create(['guard_name' => 'web' , 'name' => 'delete-permission']);

        //Viea Subcribe Newletters permissions
        Permission::create(['guard_name' => 'web' , 'name' => 'view-email']);
        //View permission and role
        Permission::create(['guard_name' => 'web' , 'name' => 'view-role-permission']);





        // create roles and assign created permissions

        $role = Role::create(['guard_name' => 'web', 'name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


    }
}
