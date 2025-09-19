

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Crud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-8 text-gray-900 dark:text-gray-100">
                    <p>A CRUD web application is a type of software that allows users to perform 
                       the four basic operations of persistent storage: Create, Read, Update, and 
                       Delete. These operations map directly to how data is managed in a database. 
                       For example, a user might create a new record (like adding a blog post), 
                       read or retrieve existing records (viewing posts), update a record (editing 
                       a post), or delete a record (removing a post).</p>

                    <p>Most web applications today are built around CRUD functionality because it 
                       provides a structured way of interacting with stored information. The front end 
                       (what the user sees) typically offers forms, tables, and buttons to trigger these 
                       operations, while the back end (server and database) handles the actual logic 
                       and storage.</p>

                    <p>CRUD is also a core concept in web frameworks and APIs. For example, in a REST API,
                       HTTP methods usually correspond to CRUD actions: POST for create, GET for read, 
                       PUT/PATCH for update, and DELETE for delete. This makes CRUD applications both 
                       intuitive for developers and easy to scale into more complex systems, like social 
                       media platforms, e-commerce sites, or content management systems.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>