<?php
/**
 * ----------------------------------------------------------
 * date: 2020/7/31 15:48
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;
use Phprao\ComposerTest\Interfaces\CalculatorServiceInterface;

/**
 * @RpcService(name="CalculatorService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class CalculatorService implements CalculatorServiceInterface
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

}