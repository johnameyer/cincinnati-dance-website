# cincinnati-dance-website

This Github contains the codebase for the Cincinnati Dance and Movement Center website (which is hosted [here](cincinnatidance.com)).
It is entirely written in PHP, using especially MySQL libraries, Bootstrap, and slightly JQuery. Also includes an in-house class registration
"shopping cart" with Paypal checkout.

## Getting Started

The website should only need a vars.php in the includes/ folder for the MySQL credentials. The specific variables that need to be defined
can be seen in the includes/db.php file.

Additionally, depending on where the code is placed, you may need to set the CINCI_DANCE_BASE PHP/Apache environment variable so that
relative paths work correctly.

## Built With

* [PHP](http://php.net/manual/en/index.php)
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/)
* [jQuery](https://api.jquery.com/)
* [PayPal](https://developer.paypal.com/)
* [jQuery Validation Plugin](https://jqueryvalidation.org/documentation/)

## Authors

* **John (Jack) Meyer** - *MySQL, Paypal, general design* - [John Meyer](https://github.com/johnameyer)
* **Keith Meyer** - *general fixes and improvements* - [Keith M Meyer](https://github.com/Oxymoron0042)
