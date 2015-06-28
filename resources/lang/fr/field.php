<?php

return [
    'title'            => [
        'name'         => 'Titre',
        'placeholder'  => 'Bonjour tout le monde !',
        'instructions' => 'Quel est le titre de la page ?'
    ],
    'slug'             => [
        'name'         => 'Slug',
        'placeholder'  => 'bonjour-tout-le-monde',
        'instructions' => "Le slug est utilisé pour identifier la page dans l'URL"
    ],
    'meta_title'       => [
        'name'         => 'Titre Méta',
        'placeholder'  => 'Bonjour tout le monde !',
        'instructions' => "Entrez un titre spécifiquement pour le référencement. Si vide, le titre sera utilisé."
    ],
    'meta_description' => [
        'name'         => 'Description Méta',
        'placeholder'  => 'Bienvenue sur notre nouveau site !',
        'instructions' => 'Entrez la description de la page pour les moteurs de recherche.'
    ],
    'meta_keywords'    => [
        'name'         => 'Mots-clés Méta',
        'instructions' => 'Entrez les mots-clés de la page pour les moteurs de recherche.'
    ],
    'ttl'              => [
        'name'         => 'TTL',
        'label'        => 'Durée de vie',
        'instructions' => 'Combien de temps en secondes cette page doit-être mise en cache ?'
    ],
    'css'              => [
        'name'         => 'CSS',
        'instructions' => 'CSS personnalisé pour cette page, vous pouvez utiliser les tags.'
    ],
    'js'               => [
        'name'         => 'JS',
        'instructions' => 'JavaScript personnalisé pour cette page, vous pouvez utiliser les tags.'
    ],
    'name'             => [
        'name'         => 'Nom',
        'instructions' => 'Quel est le nom de ce type de page ?'
    ],
    'description'      => [
        'name'         => 'Description',
        'instructions' => 'Description du type de page.'
    ],
    'theme_layout'     => [
        'name'         => 'Gabarit de thème',
        'instructions' => 'Le contenu de la page sera affiché dans le gabarit de thème.'
    ],
    'layout'           => [
        'name'         => 'Gabarit personnalisé',
        'instructions' => "Le gabarit personnalisé peut être utilisé pour afficher la page."
    ],
    'allowed_roles'    => [
        'name'         => 'Rôles autorisés',
        'instructions' => 'Quels rôles utilisateur est autorisé à afficher cette page ?'
    ],
    'enabled'          => [
        'name'         => 'Activé',
        'label'        => 'Est-ce que cette page est active ?',
        'instructions' => 'Seules les pages actives sont affichées sur le site.'
    ],
    'parent'           => [
        'name'         => 'Parent',
        'instructions' => 'Choisissez un parent pour cette page si elle en a.'
    ]
];
