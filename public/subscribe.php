<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

$mailchimp = new Mailchimp\MailchimpLists(getenv('MAILCHIMP_API_KEY'));
$list = $mailchimp->getLists()->lists[0];

$email = $_POST['email'] ?? '';
$airport = $_POST['airport'] ?? '';

if (empty($email) && empty($airport)) {
    throw new \Exception('Email and airport are both required');
}

$mailchimp->addMember($list->id, $email, [
    'status' => 'subscribed',
    'merge_fields' => [
        'AIRPORT' => $airport
    ]
]);
