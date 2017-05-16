<?php
require_once __DIR__ . '/iNode.php';

class Node implements iNode
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var iNode[]
     */
    public $childs = [];

    /**
     * @var iNode
     */
    private $parent;

    /**
     * Node constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * Имя листа, если есть, иначе NULL
     *
     * @return string
     */
    function getName(): string
    {
        return $this->name;
    }

    /**
     * Изменить имя листа
     *
     * @param string $name
     */
    function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Массив из Node's
     * которые являются дочерними по отношениею к текущему листу, иначе пустой массив
     *
     * @return array
     */
    function getChildren(): array
    {
        return $this->childs;
    }

    /**
     * Добавляет дочерний лист
     *
     * @param iNode $child
     */
    function addChild(iNode $child)
    {
        $this->childs[] = $child;
    }

    /**
     * Удаляет дочерний лист
     *
     * @param $key
     */
    function removeChild($key) {
        unset($this->childs[$key]);
    }

    /**
     * Родительский лист, если нет, то NULL
     *
     * @return iNode
     */
    function getParent(): iNode
    {
        return $this->parent;
    }

    /**
     * Устанавливает лист-родитель
     *
     * @param iNode $parent
     */
    function setParent(iNode $parent)
    {
        $this->parent = $parent;
    }
}