# Example for Sanctum stateful authentication

- [ ]  new project with breeze api only
- [ ]  new postman collection called sanctum stateful
- [ ]  create an environment called sanctum stateful and select it
- [ ]  create a post request to login, this will return 419
- [ ]  add the pre request script, now you set the cookie to postman env
- [ ]  add X-XSRF-TOKEN header to request and get the value from env, csrf setup is done
- [ ]  create a get request to api/user
- [ ]  add referer header and make sure it’s the same as app_url in .env or other sanctum.stateful config urls
- [ ]  you can add domain to postman env variables just in case
