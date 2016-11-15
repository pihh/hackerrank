<?php

class person {
    protected $firstName, $lastName, $id;

    public function __construct($first_name, $last_name, $identification) {
        $this->firstName = $first_name;
        $this->lastName = $last_name;
        $this->id = $identification;
    }

    function printPerson() {
        print("Name: {$this->lastName}, {$this->firstName}\n");
        print("ID: {$this->id}\n");
    }
}

class Student extends person {
    private $testScores;

    public function __construct($first_name, $last_name, $id, $scores){
        parent::__construct($first_name, $last_name, $id);
        $this->testScores = $scores;
    }

    public function calculate(){
        $grade = array_sum($this->testScores)/count($this->testScores);
        $res = 'T';
        switch(true){

            case ($grade >= 90):
                $res = 'O';
                break;
            case ($grade >= 80 && $grade < 90 ):
                $res = 'E';
                break;
            case ($grade >= 70 && $grade < 80 ):
                $res = 'A';
                break;
            case ($grade >= 55 && $grade < 70 ):
                $res = 'P';
                break;
            case ($grade >= 40 && $grade < 55 ):
                $res = 'D';
                break;
            case $grade <  40:
                $res = 'T';
                break;
        };

        return $res;
    }
}


$file = fopen("php://stdin", "r");

$name_id = explode(' ', fgets($file));

$first_name = $name_id[0];
$last_name = $name_id[1];
$id = (int)$name_id[2];

fgets($file);

$scores = array_map(intval, explode(' ', fgets($file)));

$student = new Student($first_name, $last_name, $id, $scores);

$student->printPerson();

print("Grade: {$student->calculate()}");
