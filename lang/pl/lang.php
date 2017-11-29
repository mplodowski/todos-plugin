<?php

return [
    'plugin' => [
        'name' => 'Renatio ToDo Lista',
        'description' => 'Lista zadań do wykonania.',
    ],
    'navigation' => [
        'todos' => 'ToDo',
    ],
    'field' => [
        'name' => 'Nazwa',
        'open_tasks' => 'Otwarte zadania',
        'completed_tasks' => 'Zakończone zadania',
        'description' => 'Notatka',
        'created_at' => 'Data utworzenia',
        'actions' => 'Akcje',
        'priority' => 'Priorytet',
        'due_at' => 'Ustaw termin',
        'reminder_at' => 'Ustaw przypomnienie',
        'attachments' => 'Załączniki',
        'priority' => 'Priorytet',
        'completed_at' => 'Zakończone',
    ],
    'column' => [
        'due_at' => 'Termin',
        'reminder_at' => 'Przypomnienie',
    ],
    'list' => [
        'create' => 'Nowa lista',
        'label' => 'Lista',
        'name' => 'Lista',
        'edit' => 'Edycja listy',
        'manage' => 'ToDo Lista',
        'reorder' => 'Zmień kolejność',
        'return' => 'Powrót do list',
    ],
    'task' => [
        'name' => 'zadanie',
        'create' => 'Nowe zadanie',
        'open_empty' => 'Brak otwartych zadań',
        'completed_empty' => 'Brak zakończonych zadań',
        'reorder' => 'Zmień kolejność',
        'return' => 'Powrót do listy',
        'complete' => 'Zakończ',
        'open' => 'Otwórz',
    ],
    'priority' => [
        'highest' => 'Bardzo wysoki',
        'high' => 'Wysoki',
        'normal' => 'Normalny',
        'low' => 'Niski',
        'lowest' => 'Bardzo niski',
    ],
    'permissions' => [
        'tab' => 'ToDo Lista',
        'access_todos' => 'Dostęp do ToDo listy',
    ],
];