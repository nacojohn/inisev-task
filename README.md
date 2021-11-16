<p><a href="https://inisev.com" target="_blank"><img src="https://inisev.com/themes/inisev-theme/assets/images/about-us/header-logo.png" width="400"></a></p>

## Table of Contents
- [About Inisev](#about)
- [Response Code](#response-codes)
- [Headers](#headers)
- [Endpoints](#endpoints)
    1. [Authentication](#authentication)
- [License](#license)

## About

Inisev believe that we're living in amazing times - where it's possible to work 100% remotely, having completely flexible working hours, access to open-source code, inexpensive hosting and much more. The environment to run an internet business has never been better!

## Response Codes

- 200 - OK
- 429 - Too much request, try again after 30 secs 
- 401 - Unauthorized
- 422 - Unprocessed request due to invalid data

## Headers

- `Accept` set to `application/json`

## Endpoints

URL: `http://localhost/inisev-task/`
Suffix: `/public/api/`

#### User Subscription

- Endpoint: `{URL}+{Suffix}+'subscribe'`
- Method: `POST`
- Body:

                {
                    'firstname' => 'required',
                    'email' => [
                        'required',
                        'email'
                    ],
                    'website' => 'required'
                }

#### Check Username Availability

- Endpoint: `{URL}+{Suffix}+'check-username'`
- Method: `POST`
- Header: `Authorization` set to `Bearer {TOKEN}`
- Body:

                {
                    'username' => 'required'
                }


## License

The simple task was provided by Inisev.

