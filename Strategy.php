<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/**
 * Проблема может решиться с помощью паттерна стратегия:
 */
interface ITree
{
}

/**
 * Срыв листка
 */
interface IGetLeafAction
{
    public function getLeaf(): void;
}

/**
 * Осенний листопад
 */
interface IFallLeavesAction
{
    public function fallLeaves(): void;
}

/**
 * Снять с дерева фрукт
 */
interface IGetFruitAction
{
    public function getFruit(): void;
}

/**
 * Сорвать листок
 */
class GetDeciduousLeafAction implements IGetLeafAction
{
    public function getLeaf(): void
    {
        echo 'Листок!';
    }
}

/**
 * Сорвать хвою
 */
class GetConiferousLeafAction implements IGetLeafAction
{
    public function getLeaf(): void
    {
        echo 'Хвоя!';
    }
}

/**
 * Листопад лиственных деревьев
 */
class GetDeciduousFallLeavesAction implements IFallLeavesAction
{
    public function fallLeaves(): void
    {
        echo 'Опавшая листва';
    }
}

/**
 * Листопад хвойных деревьев
 */
class GetConiferousFallLeavesAction implements IFallLeavesAction
{
    public function fallLeaves(): void
    {
        echo 'Опавшая хвоя';
    }
}

/**
 * Сосна
 */
class Pine implements ITree, IGetLeafAction
{
    public IGetLeafAction $getLeafAction;

    public function __construct()
    {
        $this->getLeafAction = new GetConiferousLeafAction();
    }

    public function getLeaf(): void
    {
        $this->getLeafAction->getLeaf();
    }
}

/**
 * Берёза
 */
class Birch implements ITree, IGetLeafAction, IFallLeavesAction
{
    public IGetLeafAction $getLeafAction;
    public IFallLeavesAction $fallLeafAction;

    public function __construct()
    {
        $this->getLeafAction = new GetDeciduousLeafAction();

        $this->fallLeafAction = new GetDeciduousFallLeavesAction();
    }

    public function getLeaf(): void
    {
        $this->getLeafAction->getLeaf();
    }

    public function fallLeaves(): void
    {
        $this->fallLeafAction->fallLeaves();
    }
}

/**
 * Дуб
 */
class Oak implements ITree, IGetLeafAction, IFallLeavesAction
{
    public IGetLeafAction $getLeafAction;

    public IFallLeavesAction $fallLeafAction;

    public function __construct()
    {
        $this->getLeafAction = new GetDeciduousLeafAction();

        $this->fallLeafAction = new GetDeciduousFallLeavesAction();
    }

    public function getLeaf(): void
    {
        $this->getLeafAction->getLeaf();
    }

    public function fallLeaves(): void
    {
        $this->fallLeafAction->fallLeaves();
    }
}

/**
 * Яблоня
 */
class AppleTree implements ITree, IGetLeafAction, IFallLeavesAction, IGetFruitAction
{
    public IGetLeafAction $leafAction;
    public IFallLeavesAction $fallLeavesAction;

    public function __construct()
    {
        $this->leafAction = new GetDeciduousLeafAction();

        $this->fallLeavesAction = new GetDeciduousFallLeavesAction();
    }

    public function getLeaf(): void
    {
        $this->leafAction->getLeaf();
    }

    public function fallLeaves(): void
    {
        $this->fallLeavesAction->fallLeaves();
    }

    public function getFruit(): void
    {
        echo 'Яблоко!';
    }
}

/**
 * Лиственница
 */
class Larch implements ITree, IGetLeafAction, IFallLeavesAction
{
    public IGetLeafAction $getLeafAction;
    public IFallLeavesAction $fallLeafAction;

    public function __construct()
    {
        $this->getLeafAction = new GetConiferousLeafAction();

        $this->fallLeafAction = new GetConiferousFallLeavesAction();
    }

    public function getLeaf(): void
    {
        $this->getLeafAction->getLeaf();
    }

    public function fallLeaves(): void
    {
        $this->fallLeafAction->fallLeaves();
    }
}

$lisaBirch = new Birch();
$lisaBirch->fallLeaves();
echo "\n";
$lisaBirch->getLeaf();
echo "\n\n";

$denLarch = new Larch();
$denLarch->getLeaf();
echo "\n";
$denLarch->fallLeaves();
echo "\n\n";

$bobPine = new Pine();
$bobPine->getLeaf();
echo "\n\n";