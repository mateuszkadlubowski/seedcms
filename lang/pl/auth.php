<?php

/*
|--------------------------------------------------------------------------
| Authentication Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

return [
    'failed' => 'Nieprawidłowe dane logowania.',
    'password' => 'Podane hasło jest nieprawidłowe.',
    'throttle' => 'Za dużo nieudanych prób logowania. Proszę spróbować za :seconds sekund.',

    'register' => [
        'title' => 'Rejestracja',
        'smalltext' => 'Zajmie to tylko kilka chwil',
        'btn' => 'Zarejestruj się',
    ],
    'login' => [
        'title' => 'Zaloguj się',
        'remember_me' => 'Zapamiętaj mnie',
    ],
    'forgot_password' => [
        'title' => 'Przypominanie hasła',
        'tip' => 'Zapomniałeś hasła? Nie ma problemu. Po prostu podaj nam swój adres email, a wyślemy Ci link do resetowania hasła, który pozwoli Ci wybrać nowe.'
    ],
    'reset_password' => [
        'title' => 'Resetowanie hasła',
    ],
    'confirm_password' => [
        'title' => 'Potwierdź hasło',
        'tip' => 'Potwierdź swoje hasło przed kontynuowaniem.',
        'failed' => 'Podane hasło nie jest zgodne z naszymi danymi.',
    ],
    'verify_email' => [
        'title' => 'Zweryfikuj email',
        'tip' => 'Dziękujemy za zarejestrowanie się! Czy przed rozpoczęciem możesz zweryfikować swój adres email, klikając link, który właśnie do Ciebie wysłaliśmy. Jeśli nie otrzymałeś maila, chętnie wyślemy Ci kolejny.',
        'sendmsg' => 'Nowy link weryfikacyjny został wysłany na adres email podany podczas rejestracji.',
        'success' => 'Adres email został poprawnie zweryfikowany.',
    ],
    'form' => [
        'label' => [
            'username' => 'Nazwa użytkownika',
            'email' => 'Email',
            'login_or_email' => 'Nazwa użytkownika lub email',
            'password_register' => 'Hasło (min. 8 znaków)',
            'password' => 'Hasło',
            'password_confirmation' => 'Potwierdź hasło',
        ],
        'button' => [
            'register' => 'Zarejestruj się',
            'login' => 'Zaloguj się',
            'forgot_password' => 'Wyślij link',
            'reset_password' => 'Zresetuj hasło',
            'confirm_password' => 'Potwierdź hasło',
            'resend_email' => 'Wyślij ponownie',
        ],
        'link' => [
            'to_login' => 'Masz już konto? Zaloguj się',
            'to_register' => 'Nie masz konta? Zarejestruj się',
            'to_forgot_password' => 'Nie pamiętasz hasła?',
        ]
    ],
];
