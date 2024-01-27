<?php

namespace RectorSandbox\Rector;

use PhpParser\Node;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class ChangeNameSpaceRector extends AbstractRector
{
    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        $description = 'Use isset to avoid "Notice: Undefined index" ';
        $description .= 'which is common in legacy applications. ';
        $description .= 'Note: It is recommended to specify the target line ';
        $description .= 'Note: For PHP8 and above, you can use the null-safe operator instead';

        return new RuleDefinition(
            $description, [
                new CodeSample(
                    // code before
                    '$_POST[\'non-existent-key\']',
                    // code after
                    'isset($_POST[\'non-existent-key\']) ? $_POST[\'non-existent-key\'] : null'
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [Node\Expr\Assign::class];
    }

    public function refactor(Node $node): ?Node
    {
        if ($node instanceof Node\Expr\Assign && $this->isArrayAssignment($node)) {
            return $this->createModifiedAssignment($node);
        }

        return null;
    }

    private function isArrayAssignment(Node\Expr\Assign $assign): bool
    {
        if ($assign->expr instanceof Node\Expr\ArrayDimFetch) {
            return true;
        }

        return false;
    }

    private function createModifiedAssignment(Node\Expr\Assign $assign): Node\Expr\Assign
    {
        // Modify the assignment to use isset() and the ternary operator
        return new Node\Expr\Assign(
            $assign->var,
            new Node\Expr\Ternary(
                new Node\Expr\Isset_([$assign->expr]),
                $assign->expr,
                new Node\Expr\ConstFetch(new Node\Name('null'))
            )
        );
    }
}
