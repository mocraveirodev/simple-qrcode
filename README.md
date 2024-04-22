# QR Code Generator API Documentation ✅

Welcome to the QR Code Generator API! This API allows you to create QR codes dynamically by using the Laravel 11 framework. The `/api/qr-code` endpoint accepts query parameters to customize your QR code based on size and data.

## Endpoint

**GET** `/api/qr-code`

### Query Parameters

-   `size` (required): Integer specifying the size of the QR code in pixels. Must be between 10 and 1000.
-   `data` (required): String containing the data to be encoded into the QR code. This can be plain text or structured data with special prefixes for different functionalities as described below.

### Special Data Prefixes

Depending on the prefix of the `data` parameter, the QR code will represent different types of information:


| Usage | Prefix | Example |
| --- | --- | --- |
| Website URL | http:// | http://www.google.com/ |
| Secured URL | https:// | https://www.google.com/ |
| E-mail Address | mailto: | mailto:janedoe@email.com |
| Phone Number | tel: | tel:555-555-5555 |
| Text (SMS) | sms: | sms:555-555-5555 |
| Text (SMS) With Pretyped Message | sms: | sms::I am a pretyped message |
| Text (SMS) With Pretyped Message and Number | sms: | sms:555-555-5555:I am a pretyped message |
| Geo Address | geo: | geo:-78.400364,-85.916993 |
| MeCard | mecard: | MECARD:Jane, Doe;Some Address, Somewhere, 20430;TEL:555-555-5555;EMAIL:janedoe@email.com; |
| VCard | BEGIN:VCARD | [See Examples](https://en.wikipedia.org/wiki/VCard) |
| Wifi | wifi: | wifi:WEP/WPA;SSID;PSK;Hidden(True/False) |

### Usage Example

**Request:**
 ```http
 GET /api/qr-code?size=200&data=https://www.google.com
 ```
 
**Response:**
```plaintext
(QR code image is returned based on the specified parameters)
``` 

### Web Version
Additionally, there is a web version of the QR Code Generator with the same requirements, but the /api prefix is omitted from the endpoint.

### Demo
Check out our online demo at https://simple-qrcode-zsg4.onrender.com to see the QR Code Generator API in action!

## Getting Started

1.  **Base URL**: Ensure you know the base URL where the API is hosted. The endpoint mentioned above will be appended to this base URL.
    
2.  **Query Parameters**: Include `size` and `data` parameters in your request according to the requirements stated above.
    
3.  **Error Handling**: The API is designed to communicate specific issues in the request parameters with clear error messages, helping clients to quickly diagnose and fix issues in their API requests. Below are the common error messages that you might encounter:

-   **size.required:** 'The size field is required.'
    
    -   This error occurs when the `size` parameter is not included in the request. Ensure that you specify a size value when you make a request.
-   **size.numeric:** 'The size field must be a number'
    
    -   This error indicates that the `size` parameter is not a valid number. Please ensure that you provide a numerical value for size.
-   **size.integer:** 'The size field must be an integer'
    
    -   This error indicates that the `size` parameter is not a valid integer. Please ensure that you provide a numerical value for size.
-   **size.min:** 'The size field must be at least 10'
    
    -   This message is returned when the value specified in the `size` parameter is less than the minimum allowed size of 10 pixels. Adjust your request to meet this minimum size requirement.
-   **size.max:** 'The size field must not be greater than 1000'
    
    -   This error is displayed when the `size` parameter exceeds the maximum limit of 1000 pixels. Ensure that your size value does not surpass this limit.
-   **data.required:** 'The data field is required'
    
    -   This error occurs when the `data` parameter is missing in the request. The `data` parameter is essential for generating the QR code, so make sure to include it.
    

## Contribution

Feel free to fork this repository and submit pull requests to enhance the functionalities of the QR Code Generator API. Bug reports and feature requests are welcome. Please use the issue tracker for any questions or concerns.

## License

This project is licensed under the MIT License - see the LICENSE.md file for details.

## Contact

For support or to contact the developer, please send an email to craveiromonica@gmail.com.

----------
Made by Monica Craveiro 💜