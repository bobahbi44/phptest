<?php
require_once __DIR__ . '/iTree.php';
require_once __DIR__ . '/Node.php';

class Tree implements iTree
{
    /**
     * @var iNode;
     */
    public $root;

    public function __construct(iNode $root)
    {
        $this->root = $root;
    }

    /**
     * Возвращает корневой лист дерева, NULL, если нет
     *
     * @return iNode
     */
    function getRoot(): iNode
    {
        return $this->root;
    }

    /**
     * Корневой лист дерева, NULL, если нет
     *
     * @param string $nodeName
     * @return iNode|null
     */
    function getNode(string $nodeName): ?iNode
    {
        if (!isset($this->root)) {
            return null;
        }

        return $this->findNodeRecursive($nodeName, $this->getRoot());
    }

    /**
     * Рекурсивный поиск по всем веткам дерева
     *
     * @param string $nodeName
     * @param iNode $node
     * @return iNode|null
     */
    private function findNodeRecursive(string $nodeName, iNode $node)
    {
        if ($nodeName == $node->getName()) {
            return $node;
        }
        foreach($node->getChildren() as $child) {
            if ( ($result = $this->findNodeRecursive($nodeName, $child)) !== null) {
                return $result;
            }
        }
        return null;
    }

    /**
     * Добавляет лист к листу $parent
     *
     * @param iNode $node
     * @param iNode $parent
     * @return iNode
     * @throws ParentNotFoundException
     */
    function appendNode(iNode $node, iNode $parent): iNode
    {
        if (!$this->getNode($parent->getName())) {
            throw new ParentNotFoundException;
        }

        $parent->addChild($node);

        $node->setParent($parent);

        return $node;
    }

    /**
     * Удаляет лист и всех детей рекурсивно
     *
     * @param iNode $node
     * @throws NodeNotFoundException
     */
    function deleteNode(iNode $node)
    {
        if (!$this->getNode($node->getName())) {
            throw new NodeNotFoundException;
        }
        $parent = $node->getParent();
        if ($parent) {
            if (($key = array_search($node, $parent->getChildren())) !== false) {
                $parent->removeChild($key);
            }
        }
    }

    /**
     * Json представление дерева
     * Ключи без кавычек, что противоречит "RFC 4627" (для javascript не является ошибкой).
     *
     * @return string
     */
    function toJSON(): string
    {
        $json = json_encode($this, JSON_UNESCAPED_UNICODE);

        return preg_replace('!"([a-z]+)":!', '$1:', $json);
    }
}

class NodeNotFoundException extends Exception {}
class ParentNotFoundException extends Exception {}