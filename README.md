Yii 2 Twillio
===========================
twillio for yii 2

This fork is primarily for working with the production version of the Twilio SDK. But I'm adding a few things that I want.

Installation
------------

**I have not added this to packagist yet. Not sure if I'm going to maintain the changes or not.**

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ssimpson/yii2-twillio "*"
```

or add

```
"ssimpson/yii2-twillio": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, you should configure it in the application configuration like the following,

```php
'components' => [
    'twillio' => [
        'class' => 'ssimpson\yii2-twillio\Twillio',
        'sid' => 'your_sid',
        'token' => 'your_token',
        'from'  => 'your_number', // code can override, but set the default
        'area'  => 'default_area_code', // ok this is so 80s but what can I say, it works for 80%
    ]
]
```

** Sending a simple message

```php
$twillio = Yii::$app->twillio;
$message = $twillio->getClient()->account->messages->sendMessage(
    '9991231234', // From a valid Twilio number
    '8881231234', // Text this number
    "Hello monkey!"
)

print $message->sid;
```
