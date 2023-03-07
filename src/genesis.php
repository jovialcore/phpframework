<?php

declare(strict_types=1);

namespace DemoPhpframework;

/**
 * Dependency Injection from a bible Base Creation Example
 *
 * First what is Dependency Injection:
 * Dependency injection says that instead of a class accessing other dependencies (say class, or objects of a class, etc) instead that dependency ( class, object, etc) is supplied or provided to it. In otherwords, a classdoesn't need to reachout but it is supplied with what ever neccesary class, object, etc it will be needing.
 *
 *
 * For further reading : https://php-di.org/doc/understanding-di.html
 *
 */
// God begins Creation
class God
{
    public function speakTheWord()
    {
        echo " Let there be Light !!!!";
    }

    public function createMan()
    {
        echo " Lets create man in our own image and in our likeness";
    }
}



///without dependcy injection

class creationWithoutDi
{
    public function manifest()
    {
        $God = new God();
        $God->speakTheWord();
    }

    //here we can seee that we are creating a new instance of this over and over again
    public function createMan()
    {
        $God = new God();
        $God->createMan();
    }
}



// with dependency injection
class creation
{
    private $wordSpoken;

    //more like injecting the other classes objects, properties easily
    public function __construct(God $wordSpoken)
    {
        $this->wordSpoken = $wordSpoken;
    }
    // now i have access to the methods, properties in the God class
    public function manifestWord()
    {
        return $this->wordSpoken->speakTheWord();
    }

    public function manifestFlesh()
    {
        return $this->wordSpoken->createMan();
    }
}

//Lets implement interfaces with dependecny injection base on a creation story

//the interface
interface CreationInterface
{
    public function spokenWord();
}

// Day one of creation, what did God say ? What is the word God spoke ?
class DayOne implements CreationInterface
{
    public function spokenWord()
    {
        echo " Let there be Light !!!!";
    }
}

// Day five of creation, what did God say ? What is the word God spoke ?
class DayFive implements CreationInterface
{
    public function spokenWord()
    {
        echo " Lets create man in our own image and in our likeness";
    }
}

// dependency injection here:
class beginCreation
{
    private $whatGodSaid;

    // creation inteface is like the adapter
    public function __construct(CreationInterface $whatGodSaid)
    {
        $this->whatGodSaid = $whatGodSaid;
    }


    public function execute()
    {
        return $this->whatGodSaid->spokenWord();
    }
}

// here we pass the dayone class as parameter to beginCreation which will output what it is meant to do. Example, dayFive, create man
$dayOne = new dayOne(); //change/instantiate dayOne
$beginCreation = new beginCreation($dayOne);


echo $beginCreation->execute();
