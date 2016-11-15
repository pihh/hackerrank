<?php
abstract class Book
{

    protected $title;
    protected  $author;

     function __construct($t,$a){
        $this->title=$t;
        $this->author=$a;
    }
    abstract protected function display();
}

class MyBook extends Book
{
    public $price;

    public function __construct($t,$a,$p){

        parent::__construct($t,$a);
        $this->price = $p;

    }

    public function display(){
        print("Title: $this->title\nAuthor: $this->author\nPrice: $this->price");
    }
}
