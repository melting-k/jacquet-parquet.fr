<?php
return (object) [
    'contact'   => (object) [
        'title'     => "Quel est votre projet ?",
        'form'                  =>  (object) [
            'action'            => "form/form-mail-contact.php",
            'id'                => "form-contact",
            'consent'           => "En soumettant ce formulaire, j'accepte que les données transmises soient exploitées dans le cadre de ma prise de contact.",
            'send'              => "Envoyer",

            'fields'            => (object) [
                (object) [
                    'type'          => "text",
                    'format'        => false,
                    'class'         => "",
                    'name'          => "Nom--et--prenom",
                    'required'      => true,
                    'placeholder'   => "Nom / prénom"
                ],
                (object) [
                    'type'          => "email",
                    'format'        => "email",
                    'class'         => "",
                    'name'          => "Email",
                    'required'      => true,
                    'placeholder'   => "Adresse e-mail"
                ],
                (object) [
                    'type'          => "text",
                    'format'        => "phone",
                    'class'         => "",
                    'name'          => "Téléphone",
                    'required'      => true,
                    'placeholder'   => "Téléphone"
                ],
                (object) [
                    'type'          => "select",
                    'format'        => false,
                    'name'          => "Objet--de--la--demande",
                    'required'      => true,
                    'placeholder'   => "Votre demande concerne",
                    'options'       => (object) [
                        "La pose de parquet",
                        "La rénovation de parquet",
                        "Les terrasses bois",
                        "Autre sujet"
                    ]
                ],
                (object) [
                    'type'          => "textarea",
                    'format'        => false,
                    'name'          => "Message",
                    'required'      => true,
                    'placeholder'   => "Message"
                ],
            ],
        ],
    ]
];