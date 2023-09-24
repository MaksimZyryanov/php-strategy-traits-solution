<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/**
 * Допустим: был абстрактный класс растения, у которого предложен абстрактный метод, который отрывает листок:
 * abstract public function getLeaf(): void;
 */
abstract class Tree
{
    abstract public function getLeaf(): void;

    // Но - Добавили абстрактный метод который отвечает за осеннее опадаение листвы:
    abstract public function fallLeaves(): void;

}

/** Сосна */
class Pine extends Tree
{
    // У сосны не может опасть листва
    public function fallLeaves(): void
    {
        throw new Exception('Not implemented exception');
    }

    public function getLeaf(): void
    {
        echo 'Хвоя!';
    }
}

/** Дуб */
class Oak extends Tree
{
    public function fallLeaves(): void
    {
        echo 'Опавшая листва';
    }

    public function getLeaf(): void
    {
        echo 'Листок';
    }
}

/** Берёза */
class Birch extends Tree
{

    public function fallLeaves(): void
    {
        echo 'Опавшая листва';
    }

    public function getLeaf(): void
    {
        echo 'Листок';
    }
}


/**
 * Проблема наследования в том, что оно не учитывает будущее изменение, которое вероятнее всего будет,
 * поэтому придется постоянно изменять верхние уровни абстракции под текущую реализацию
 * например выносим [лиственное] дерево у которого могут [опадать листья]:
 *
 * DeciduousTree - абстрактный класс для лиственных деревьев
 *
 * Tree -> Pine
 * Tree -> FallingLeaves -> FallingLeavesDeciduousTree -> Birch
 * Tree -> FallingLeaves -> FallingLeavesDeciduousTree -> Oak
 * // Добавим еще одну абстрактную сущность например FallingLeavesDeciduousFruitTree с фруктовыми плодами
 * Tree -> DeciduousTree -> FallingLeavesDeciduousTree -> FallingLeavesDeciduousFruitTree -> AppleTree
 *
 * Но стоит добавить [хвойную] лиственницу у которой [могут опадать листья] или например искусственное дерево,
 * у которого нельзя оторвать листок и которое, очевидно, не опадает - придется еще раз менять вернхие уровни абстракции
 *
 * Поэтому используем интерфейсы, но всё также остается проблема повторного определения кода - несколько раз придется
 * писать логику для:
 * public function getLeaf(): void
    {
        echo 'Листок';
    }
 * и так далее...
 *
 * Поэтому в ООП для PHP могут быть предложено несколько решений:
 */
