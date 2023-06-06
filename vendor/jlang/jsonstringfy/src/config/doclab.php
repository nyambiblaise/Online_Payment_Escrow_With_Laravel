<?php

return [
  'php' => [
      'version' => '7.2.0',
      'extension' => ['bcmath', 'ctype', 'fileinfo', 'gd', 'json', 'mbstring', 'openssl', 'PDO', 'tokenizer', 'xml'],
      'permissions' => [
          'bootstrap/cache' => '775',
          'storage/app' => '775',
          'storage/framework' => '775',
          'storage/logs' => '775',
          '.env' => '775',
      ],
  ],
    'pid' => '',
    'home_url' => '/',
    'portfolio_url' => 'https://codecanyon.net',
];
