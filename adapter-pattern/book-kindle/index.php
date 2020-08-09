<?php

require('vendor/autoload.php');

use Acme\Book;
use Acme\Person;
use Acme\Kindle;
use Acme\eReaderAdapter;

$person = new Person();
$person->read(new Book());
$person->read(new eReaderAdapter(new Kindle()));
