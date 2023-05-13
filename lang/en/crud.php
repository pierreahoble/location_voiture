<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'biens' => [
        'name' => 'Biens',
        'index_title' => 'Biens List',
        'new_title' => 'New Bien',
        'create_title' => 'Create Bien',
        'edit_title' => 'Edit Bien',
        'show_title' => 'Show Bien',
        'inputs' => [
            'designation' => 'Designation',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'immatriculation' => 'Immatriculation',
            'prix_jour' => 'Prix Jour',
            'annee' => 'Annee',
            'couleur' => 'Couleur',
            'type_consomation' => 'Type Consomation',
            'transmission' => 'Transmission',
            'conso_sur_cent' => 'Conso Sur Cent',
            'moteur' => 'Moteur',
            'Nbre_porte' => 'Nbre Porte',
            'Nbre_place' => 'Nbre Place',
            'Description' => 'Description',
            'type_id' => 'Type',
            'gerant_id' => 'User',
            'modele_id' => 'Modele',
            'marque_id' => 'Marque',
        ],
    ],

    'caracteristiques' => [
        'name' => 'Caracteristiques',
        'index_title' => 'Caracteristiques List',
        'new_title' => 'New Caracteristique',
        'create_title' => 'Create Caracteristique',
        'edit_title' => 'Edit Caracteristique',
        'show_title' => 'Show Caracteristique',
        'inputs' => [
            'designation' => 'Designation',
            'valeur' => 'Valeur',
            'bien_id' => 'Bien',
        ],
    ],

    'marques' => [
        'name' => 'Marques',
        'index_title' => 'Marques List',
        'new_title' => 'New Marque',
        'create_title' => 'Create Marque',
        'edit_title' => 'Edit Marque',
        'show_title' => 'Show Marque',
        'inputs' => [
            'designation' => 'Designation',
            'description' => 'Description',
        ],
    ],

    'all_media' => [
        'name' => 'All Media',
        'index_title' => 'AllMedia List',
        'new_title' => 'New Media',
        'create_title' => 'Create Media',
        'edit_title' => 'Edit Media',
        'show_title' => 'Show Media',
        'inputs' => [
            'type' => 'Type',
            'lien' => 'Lien',
            'bien_id' => 'Bien',
        ],
    ],

    'modeles' => [
        'name' => 'Modeles',
        'index_title' => 'Modeles List',
        'new_title' => 'New Modele',
        'create_title' => 'Create Modele',
        'edit_title' => 'Edit Modele',
        'show_title' => 'Show Modele',
        'inputs' => [
            'designation' => 'Designation',
            'description' => 'Description',
        ],
    ],

    'types' => [
        'name' => 'Types',
        'index_title' => 'Types List',
        'new_title' => 'New Type',
        'create_title' => 'Create Type',
        'edit_title' => 'Edit Type',
        'show_title' => 'Show Type',
        'inputs' => [
            'designation' => 'Designation',
            'description' => 'Description',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'nom_prenom' => 'Nom Prenom',
            'tel' => 'Tel',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
