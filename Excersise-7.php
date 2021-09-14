<?php

class Dog
{
    protected string $name;
    protected string $gender;
    protected string $mother = 'Unknown';
    protected string $father = 'Unknown';

    public function mothersName()
    {
        return $this->mother;
    }

    public function fathersName()
    {
        return $this->father;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mother;
    }
}

class DogTest extends Dog
{
    public function __construct(string $name, string $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
    }

    public function assignMother(string $mother): void
    {
        $this->mother = $mother;
    }

    public function assignFather(string $father): void
    {
        $this->father = $father;
    }
}

$dogs = [
    new DogTest('Max', 'male'),
    new DogTest('Rocky', 'male'),
    new DogTest('Sparky', 'male'),
    new DogTest('Buster', 'male'),
    new DogTest('Sam', 'male'),
    new DogTest('Lady', 'female'),
    new DogTest('Molly', 'female'),
    new DogTest('Coco', 'female')
];

$dogs[0]->assignMother('Lady');
$dogs[0]->assignFather('Rocky');

$dogs[7]->assignMother('Molly');
$dogs[7]->assignFather('Buster');

$dogs[1]->assignMother('Molly');
$dogs[1]->assignFather('Sam');

$dogs[3]->assignMother('Lady');
$dogs[3]->assignFather('Sparky');


var_dump($dogs[4]->fathersName());

var_dump($dogs[0]->hasSameMotherAs($dogs[4]));
