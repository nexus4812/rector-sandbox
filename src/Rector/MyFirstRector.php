<?php

declare(strict_types=1);

namespace RectorSandbox\Rector;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

// @see https://getrector.com/documentation/custom-rule#:~:text=1.%20Create%20a%20New%20Rector%20and%20Implement%20Methods
final class MyFirstRector extends AbstractRector
{
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        // what node types are we looking for?
        // pick any node from https://github.com/rectorphp/php-parser-nodes-docs/
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node - we can add "MethodCall" type here, because
     *                         only this node is in "getNodeTypes()"
     */
    public function refactor(Node $node): ?Node
    {
        $methodCallName = $this->getName($node->name);
        if ($methodCallName === null) {
            return null;
        }

        // we only care about "set*" method names
        if (!str_starts_with($methodCallName, 'set')) {
            // return null to skip it
            return null;
        }

        $newMethodCallName = preg_replace('#^set#', 'change', $methodCallName);

        $node->name = new Identifier($newMethodCallName);

        // return $node if you modified it
        return $node;
    }

    /**
     * This method helps other to understand the rule and to generate documentation.
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Change method calls from set* to change*.', [
                new CodeSample(
                // code before
                    '$user->setPassword("123456");',
                    // code after
                    '$user->changePassword("123456");'
                ),
            ]
        );
    }
}
