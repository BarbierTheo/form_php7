INSERT INTO
    `76_users` (
        `user_gender`,
        `user_lastname`,
        `user_firstname`,
        `user_pseudo`,
        `user_birthdate`,
        `user_mail`,
        `user_password`,
    )
VALUES
    (
        'Homme',
        'Barbier',
        'Theo',
        'blake',
        '1998-07-24',
        'example@example.com',
        'choucroute',
    )
SELECT
    *
FROM
    `76_users`
WHERE
    `user_pseudo` = 'Azertz';

SELECT
    *
FROM
    `76_users`
WHERE
    `user_pseudo` = 'Azertz'
    OR `user_mail` = 'Azertz';