<?php
return [
    /**
     * Default path of repositories in `app` folder.
     * In this case:
     * 		app/Repositories
     */
    'path' => 'Repositories',
    /**
     * Default path of models in larave is the `app` folder.
     * In this case:
     * 		app/Models
     */
    'model_path' => 'Models',
    /**
     * Configure the naming convention you wish for your repositories.
     *
     * Example: php artisan make:repository Users
     * 		- Contract: UsersContract
     * 		- Eloquent: UsersRepository
     */
    'fileNames' => [
        'contract' => '{name}Contract',
        'eloquent' => '{name}Repository',

    ],
];