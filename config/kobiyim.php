<?php

return [
    'name' => env('KOBIYIM_NAME'),

    'username' => env('KOBIYIM_USERNAME'),

    'secret' => env('KOBIYIM_SECRET'),

    'key' => env('KOBIYIM_KEY'),

    /*
     * IP erişim kontrolü kullanılsın mı?
     * Eğer IP erişim kontrolü yapılacaksa bu kişiler
     * , (virgül) işareti ile env dosyasına ALLOWEDIP olarak
     * tanımlanacaktır.
     */
    'check_ip' => false,
];
