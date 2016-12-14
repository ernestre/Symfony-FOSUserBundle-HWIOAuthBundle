Facebook / Google login in Symfony with [HWIOAuthBundle][1] and [FOSUserBundle][2]
========================

[![Build Status](https://travis-ci.org/ernestre/Symfony-FOSUserBundle-HWIOAuthBundle.svg?branch=master)](https://travis-ci.org/ernestre/Symfony-FOSUserBundle-HWIOAuthBundle)

What's inside?
--------------

Base symfony 3.1.\* setup with `HWIOAuthBundle` and `FOSUserBundle` configured.

Instructions
--------------
**Facebook configuration**
* [Create a new facebook app][3]
* Get your new facebook app's `App ID` and `App Secret`

**Base configuration**
* Clone the repo.
* Do `comsposer install`.
* Enter facebook appId and appSecret during parameters setup.
* (Optional) Edit the `User` entity to your likings in `src/AppBundle/Entity/User.php`.
* Update your database schema. `php app/console doctrine:schema:update --force`

How to use it
--------------
**Paths**

*Base*
* `/login` - User login.
* `/logout` - User login.
* `/register` - New user registration.
* `/resetting/request` - Password recovery.
* `/profile` - User's profile page.
* `/profile/edit` - User's change info page.

*Providers*
* `/login/` - Links to available auth methods. ( Note the slash after `login` ).
* `/login/{provider}` - Direct auth link to specific provider, (`/login/facebook`).

*Console*

You can also create / activate / deactivate / delete / promote / demote / edit, users via the command line.
* `php app/console fos:user:create newuser`
* `php app/console fos:user:promote newuser ROLE_ADMIN`

**How it works**
* If the user is not registered on the website, he can use the provider ( facebook / google ) links to register on the website. After a successful login, the user is automatically registered and logged in.
* If the user is already registered via the base registration link, he can link his account with his provider's account ( facebook / google ). He can do that by logging in via the base login link and the visiting `/login/{provider}` (`/login/facebook`). The provider's ID will be assigned to the Users account and the user now can login with his credentials or his assigned provider accounts.

[1]:  https://github.com/FriendsOfSymfony/FOSUserBundle
[2]:  https://github.com/hwi/HWIOAuthBundle
[3]:  https://developers.facebook.com/

