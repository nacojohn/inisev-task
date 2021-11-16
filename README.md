<p><a href="https://inisev.com" target="_blank"><img src="https://inisev.com/themes/inisev-theme/assets/images/about-us/header-logo.png" width="400"></a></p>

## Table of Contents
- [About Inisev](#about)
- [Instruction](#instruction)
- [Response Code](#response-codes)
- [Headers](#headers)
- [Endpoints](#endpoints)
    1. [User Subscription](#user-subscription)
    2. [Create Post](#create-post)
- [License](#license)

## About

Inisev believe that we're living in amazing times - where it's possible to work 100% remotely, having completely flexible working hours, access to open-source code, inexpensive hosting and much more. The environment to run an internet business has never been better!

## Instruction

To be able to setup project

1. Pul repo from - https://github.com/nacojohn/inisev-task.git
2. Create .env from .env.example file
3. Create a MySql Database with name - "inisev" by editing the setting in .env file created
4. Setup your DB username and password by editing the setting in .env file created
5. Run command `php artisan migrate --seed` to create migration file and insert 3 websites
6. Import the Postman collection file in the repo into Postman. See [Endpoints](#endpoints)
7. You might need to edit the url property in the collection to suit your path
8. Test individual endpoints
9. Setup Mailtrap to test email
10. After creating Website post, run the command `php artisan queue:work` to execute the background task (when deploy, this has to be setup on supervisor or cron)

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

#### Create Post

- Endpoint: `{URL}+{Suffix}+'create-post'`
- Method: `POST`
- Body:

                {
                    'website' => 'required',
                    'title' => 'required',
                    'body' => 'required'
                }

## License

The simple task was provided by Inisev.

