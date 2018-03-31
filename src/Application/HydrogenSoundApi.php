<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class HydrogenSoundApi extends Kb10uyApplication
{
    /**
     * @var array
     * @Inject("data.elements")
     */
    public $elements;

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
            $result[] = 'あぁ～！' . $this->elements[array_rand($this->elements)] . 'の音ォ～！！';
        }

        $response = $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
        $response->getBody()->write(json_encode(['result' => $result]));
        return $response;
    }
}
