<?php
use SQLBuilder\ExpressionBuilder;

class ExpressionBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testExpressionBuilder()
    {
        $driver = new SQLBuilder\Driver\MySQLDriver;
        $exprBuilder = new ExpressionBuilder;
        $exprBuilder->appendExpr('a', '=', 123);
        $exprBuilder->equal('a', 1);
        $exprBuilder->notEqual('b', 2);
        $exprBuilder->in('b', [ 'a', 'b', 'c' ]);
        $exprBuilder->notIn('z', [ 'a', 'b', 'c' ]);
        $exprBuilder->between('created_at', date('c') , date('c', time() + 3600));
        echo $exprBuilder->toSql($driver);
    }
}

