<?php namespace Acme;

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();

        $book->turnPage();
    }
}