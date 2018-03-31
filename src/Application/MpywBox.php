<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;
use Library\GachaPicker;

class MpywBox extends Kb10uyApplication
{
    /**
     * @var array
     * @Inject("data.mpyw")
     */
    public $mpyws;

    public $query;
    public $urls;
    private $picker;

    public function before(): void
    {
        $this->query = $this->request->getQueryParams();
        $this->urls = array_keys($this->mpyws);
        $this->picker = new GachaPicker($this->mpyws);
    }

    public function handle(): ResponseInterface
    {
        $count = $this->query['count'] ?? 1;
        $result = [];
        for ($i = 0; $i < count($this->mpyws); $i++) $result[$i] = 0;

        for ($i = 0; $i < $count; $i++) $result[$this->picker->pickIndex()]++;
        $result = array_filter($result);

        $data = [];
        foreach($result as $i => $q) {
            $data[] = ['url' => $this->urls[$i], 'quantity' => $q];
        }

        $response = $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
        $response->getBody()->write(json_encode(['count' => $count, 'data' => $data]));
        return $response;
    }
}
