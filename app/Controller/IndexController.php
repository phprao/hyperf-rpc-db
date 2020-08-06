<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Event\UserPayedEvent;
use App\Event\UserRegisterEvent;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @AutoController()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function testUserRegister()
    {
        $this->eventDispatcher->dispatch((new UserRegisterEvent(10)));
    }

    public function testUserPayed()
    {
        $this->eventDispatcher->dispatch((new UserPayedEvent(['userId'=>10, 'money'=>100])));
    }
}
