<?php

// ТУТ МОЖНО ПРОСТО КАКИЕ-ЛИБО КОНФИГУРАЦИОННЫЕ ПАРАМЕТРЫ ПИСАТЬ

return [
    'adminEmail' => 'admin@example.com',


    // добавили для [КАПЧА] параметры
    // Тут описан процесс и как получить ключи:
    // http://webdesign.tutsplus.com/ru/tutorials/how-to-integrate-no-captcha-recaptcha-in-your-website--cms-23024
    'recaptcha' => [
        'key' => '6LcvlxsTAAAAACmBgicQG3BCdGbblEf-u5MIkkny',
        'secret' => '6LcvlxsTAAAAAPXTFPAV0Rti40qPHz-_RlvKJe29',
    ],
];
