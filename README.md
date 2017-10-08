temper-test
===========
## Build Setup

``` bash
# clone project git clone https://github.com/edgar4/temper-test.git
#  cd  in to project dir and install dependencies
 composer install

# make ddatabase called temper_test ( you can call it what you want  just remember to change the params in config dir)
 php bin/console d:s:u -f   create and migrate database
 php bin/console temper:prepare:data     prepares the csv data and loads it into a  the database
 php bin/console server:run   runs the development server

```