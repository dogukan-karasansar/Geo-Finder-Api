# Geo Finder API

This collection contains the Postman collection for the Geo Finder API. This API can be used to retrieve information related to geographical locations.

## Authentication

To access the API, you need to obtain a token first. You can use the "Token" endpoint under the "Auth" section to get a token by providing your `email` and `password` credentials.

Testing url `http://158.220.96.5:92`

### Token Endpoint

- **Method:** POST
- **URL:** `{{API_URL}}/v1/token`
- **Body:**
  - `email`: testapi@example.com
  - `password`: 123456789

## Registration

If you don't have an account yet, you can create a new account using the "Register" endpoint under the "Auth" section.

### Register Endpoint

- **Method:** POST
- **URL:** `{{API_URL}}/v1/register`
- **Body:**
  - `email`: testapi@example.com
  - `name`: tester root
  - `password`: 123456789

## Countries

You can use the endpoints under the "Countries" section to retrieve information related to geographical locations.

### Get Countries

To fetch countries based on a specific country, you can use the "Get Countries" endpoint.

- **Method:** GET
- **URL:** `{{API_URL}}/v1/countries?per_page=10`
- **Query Parameters:**
  - `filter[name]`: Filtering by country name (disabled)
  - `per_page`: Number of countries per page

### Get Cities

To retrieve cities based on a specific country and city name, you can use the "Get Cities" endpoint.

- **Method:** GET
- **URL:** `{{API_URL}}/v1/cities?filter[searchByCountryName]=pak&filter[name]=Batgram`
- **Query Parameters:**
  - `filter[searchByCountryName]`: Filtering by country name
  - `filter[name]`: Filtering by city name

## Variables

Variables used in this collection:

- `API_URL`: The base URL of the API. This variable specifies the URL to access the API.

---
This README file provides basic information on how to use the API. For more detailed information, refer to the API documentation.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
