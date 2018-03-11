<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class MpywApi extends Kb10uyApplication
{
    /**
     * @var array
     * @Inject("data.mpyw")
     */
    public $mpyws;

    public $query;

    public function before(): void
    {
        $this->query = $this->request->getQueryParams();
    }

    public function handle(): ResponseInterface
    {
        $count = $this->query['count'] ?? 1;
        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $result[] = $this->mpyws[array_rand($this->mpyws)];
        }

        $response = $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
        $response->getBody()->write(json_encode(['result' => $result]));
        return $response;
    }
}
