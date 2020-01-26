## About UPO Shop

Demo is available at http://bnx.ru/

This is a test project Ultimate Pizza Online Shop

I spend for this project nearly 20 hours

It is desined as it was real pizza shop
![Database structure](http://bnx.ru/help/Screenshot_2.jpg "Database structure")


### Some tips

- absolutely no any graphical desidn
- no images (sory, but just imagine those boxes ere pizzas fotos) i usually use "intervention/image" for image manipulation
- no admin panel (in suh cases i usually use ready-to-use panels like nova etc.)
- no emails when order created
- password is always **qwerty**
- "jeremykenedy/laravel-roles" was used to roles, but there is no admi panel, so no demo 
- in front **vue js** is used for cart subsystem^
- 1. cart add
  2. cart status
  3. cart show/edit
 
![Tests rusult](http://bnx.ru/help/Screenshot_1.jpg "Tests rusult")

![Interface tips](http://bnx.ru/help/Screenshot_3.jpg "Interface tips" )

![Cart tips](http://bnx.ru/help/Screenshot_4.jpg "Cart tips" )


####How to build:

1. clone project
2. composer update
3. npm install
4. npm build prod|dev

####How to run:

1. php7.3 artisan migrate
2. php7.3 artisan db:seed

####How to test:

1. php7.3 vendor/phpunit/phpunit/phpunit

