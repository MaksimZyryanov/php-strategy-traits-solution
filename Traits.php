<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/**
 * Проблема может решиться с помощью трейтов:
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

trait DeciduousLeafTrait
{
    public function getLeaf(): void
    {
        echo 'Листок!';
    }
}

/*
 * Пальма
 */
class Palm implements ITree, IGetLeafAction
{
    use DeciduousLeafTrait;
}