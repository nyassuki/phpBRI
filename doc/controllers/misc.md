# Misc

```php
$miscController = $client->getMiscController();
```

## Class Name

`MiscController`

## Methods

* [Get Token](../../doc/controllers/misc.md#get-token)
* [Account Information](../../doc/controllers/misc.md#account-information)


# Get Token

First endpoint to hit before making request to other endpoint in BRIAPI

```php
function getToken(string $grantType, string $clientId, string $clientSecret): Success
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `grantType` | `string` | Query, Required | - |
| `clientId` | `string` | Form, Required | - |
| `clientSecret` | `string` | Form, Required | - |

## Response Type

[`Success`](../../doc/models/success.md)

## Example Usage

```php
$grantType = 'client_credentials';
$clientId = '{{id_key}}';
$clientSecret = '{{secret_key}}';

$result = $miscController->getToken($grantType, $clientId, $clientSecret);
```

## Example Response *(as JSON)*

```json
{
  "refresh_token_expires_in": "0",
  "api_product_list": "[inquiry-sandbox]",
  "api_product_list_json": [
    "inquiry-sandbox"
  ],
  "organization_name": "bri",
  "developer.email": "furkorsan.gantheng@xyz.com",
  "token_type": "BearerToken",
  "issued_at": "1557891212144",
  "client_id": "8E20dpP7KtakFkShw5tQHOFf7FFAU01o",
  "access_token": "R04XSUbnm1GXNmDiXx9ysWMpFWBr",
  "application_name": "317d0b2f-6536-4cac-a5f0-3bc9908815b3",
  "scope": "",
  "expires_in": "179999",
  "refresh_count": "0",
  "status": "approved"
}
```


# Account Information

API endpoint to get account information and balance

```php
function accountInformation(string $bRISignature, string $bRITimestamp): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bRISignature` | `string` | Header, Required | - |
| `bRITimestamp` | `string` | Header, Required | - |

## Response Type

`void`

## Example Usage

```php
$bRISignature = '{{signature}}';
$bRITimestamp = '{{timestamp}}';

$miscController->accountInformation($bRISignature, $bRITimestamp);
```

