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
use Hyperf\Utils\Str;
use Phprao\ComposerTest\Interfaces\UserServiceInterface;

/**
 * @RpcService(name="UserService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class UserService implements UserServiceInterface
{
    public function getUserInfoByUserId(int $userId): array
    {
        return [
            'id'=>$userId,
            'name'=>Str::random(),
            'age'=>mt_rand(10, 100),
        ];
    }

    public function addUser(array $userInfo): int
    {
        return mt_rand(1000, 9999);
    }

}