<?php
/*class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo 'Привет! Меня зовут ' . $this->name . '.<br>' . 'Я ' . $this->color . '!';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }


}
$cat = new Cat('Барсик', 'серый');
echo $cat->sayHello();
*/
/*
class Post
{
    protected $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}
class Lesson extends Post
{
    protected $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        parent::__construct($title, $text);
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}

class PaidLesson extends Lesson
{
    private $price;
    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}

$paidLesson = new PaidLesson('Урок о наследовании в PHP',
    'Лол, кек, чебурек',
    'Ложитесь спать, утро вечера мудренее',
    99.90);
echo var_dump($paidLesson);
*/
/*
interface CalculateSquare
{
    public function calculateSquare(): float;
}
class Cat
{

}
class Rectangle implements CalculateSquare
{
    private $x;
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Square implements CalculateSquare
{
    private $x;

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

class Circle implements CalculateSquare
{
    const PI =  3.1416;
    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        $pi = 3.1416;
        return $pi * ($this->r ** 2);
    }
}

$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5),
    new Cat()
];

foreach ($objects as $object) {
    if ($object instanceof CalculateSquare) {
        echo 'Объект реализует интерфейс CalculateSquare. Это объект класса - ' . get_class($object).' Площадь: ' . $object->calculateSquare();
        echo '<br>';
    }
    else
    {
        echo 'Объект класса ' . get_class($object) . ' не реализует интерфейс CalculateSquare';
    }
}
echo get_class($objects[0]);
*/

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет, мир';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут ';
    }
}
class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello world';
    }

    public function getMyNameIs(): string
    {
        return 'My name is ';
    }
}

$russin = new RussianHuman('Артём');
$english = new EnglishHuman('Fred');

echo $russin->introduceYourself();
echo $english->introduceYourself();

?>
