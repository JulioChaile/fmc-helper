# fmc-helper

# FCMHelper Component

- [Español](#español)
- [English](#english)

---

## Español

### Índice

- [Descripción](#descripción)
- [Instalación](#instalación)
- [Uso](#uso)
- [Contribución](#contribución)

### Descripción
FCMHelper es un componente de PHP diseñado para facilitar el envío de notificaciones push utilizando Firebase Cloud Messaging (FCM) de Google.

### Instalación
Puedes instalar este componente mediante Composer. Ejecuta el siguiente comando en la raíz de tu proyecto:

```
composer require guzzlehttp/guzzle
```

### Uso
Para enviar una notificación push, utiliza el método `sendPushNotification` de la clase `FCMHelper`. Este método acepta los siguientes parámetros:

- `$notification`: datos de la notificación.
- `$to`: destinatario(s) de la notificación.
- `$data` (opcional): datos adicionales para enviar con la notificación.
- `$toType` (opcional): tipo de destinatario ('mult' para múltiples dispositivos, 'topic' para un tema, 'user' para un usuario específico).

```php
use common\components\FCMHelper;

// Ejemplo de envío a múltiples dispositivos
$notification = [
    'title' => 'Nuevo mensaje',
    'body' => '¡Tienes un nuevo mensaje!',
];
$registrationIds = ['device_token_1', 'device_token_2'];
$response = FCMHelper::sendPushNotification($notification, $registrationIds, [], 'mult');
```

### Contribución
Si deseas contribuir a este componente, siéntete libre de enviar pull requests o abrir issues en el repositorio de GitHub.

---

## English

### Index

- [Description](#description)
- [Installation](#installation)
- [Usage](#usage)
- [Contribution](#contribution)

### Description
FCMHelper is a PHP component designed to facilitate sending push notifications using Google's Firebase Cloud Messaging (FCM).

### Installation
You can install this component via Composer. Run the following command in the root of your project:

```
composer require guzzlehttp/guzzle
```

### Usage
To send a push notification, use the `sendPushNotification` method of the `FCMHelper` class. This method accepts the following parameters:

- `$notification`: notification data.
- `$to`: recipient(s) of the notification.
- `$data` (optional): additional data to send with the notification.
- `$toType` (optional): type of recipient ('mult' for multiple devices, 'topic' for a topic, 'user' for a specific user).

```php
use common\components\FCMHelper;

// Example of sending to multiple devices
$notification = [
    'title' => 'New Message',
    'body' => 'You have a new message!',
];
$registrationIds = ['device_token_1', 'device_token_2'];
$response = FCMHelper::sendPushNotification($notification, $registrationIds, [], 'mult');
```

### Contribution
If you want to contribute to this component, feel free to send pull requests or open issues in the GitHub repository.
