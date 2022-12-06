
# Success

## Structure

`Success`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `refreshTokenExpiresIn` | `string` | Required | - | getRefreshTokenExpiresIn(): string | setRefreshTokenExpiresIn(string refreshTokenExpiresIn): void |
| `apiProductList` | `string` | Required | - | getApiProductList(): string | setApiProductList(string apiProductList): void |
| `apiProductListJson` | `string[]` | Required | - | getApiProductListJson(): array | setApiProductListJson(array apiProductListJson): void |
| `organizationName` | `string` | Required | - | getOrganizationName(): string | setOrganizationName(string organizationName): void |
| `developerEmail` | `string` | Required | - | getDeveloperEmail(): string | setDeveloperEmail(string developerEmail): void |
| `tokenType` | `string` | Required | - | getTokenType(): string | setTokenType(string tokenType): void |
| `issuedAt` | `string` | Required | - | getIssuedAt(): string | setIssuedAt(string issuedAt): void |
| `clientId` | `string` | Required | - | getClientId(): string | setClientId(string clientId): void |
| `accessToken` | `string` | Required | - | getAccessToken(): string | setAccessToken(string accessToken): void |
| `applicationName` | `string` | Required | - | getApplicationName(): string | setApplicationName(string applicationName): void |
| `scope` | `string` | Required | - | getScope(): string | setScope(string scope): void |
| `expiresIn` | `string` | Required | - | getExpiresIn(): string | setExpiresIn(string expiresIn): void |
| `refreshCount` | `string` | Required | - | getRefreshCount(): string | setRefreshCount(string refreshCount): void |
| `status` | `string` | Required | - | getStatus(): string | setStatus(string status): void |

## Example (as JSON)

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

