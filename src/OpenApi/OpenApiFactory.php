<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ArrayObject;

class  OpenApiFactory implements OpenApiFactoryInterface{


    private  $decoreted;

    public function __construct(OpenApiFactoryInterface $decoreted)
    {
        $this->decoreted = $decoreted;
    }

    public function __invoke(array $context = []): \ApiPlatform\Core\OpenApi\OpenApi
    {
        $openApi = $this->decoreted->__invoke($context);

        
        //on récupérer les chemins
        foreach ($openApi->getPaths()->getPaths() as $key => $path) {
            if ($path->getGet() && $path->getGet()->getSummary() == 'suppression') {
                $openApi->getPaths()->addPath($key, $path->withGet(null));
            }
        }
        

        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Token'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'token' => [
                    'type' => 'string',
                    'readOnly' => true,
                ],
            ],
        ]);
        $schemas['Credentials'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'email' => [
                    'type' => 'string',
                    'example' => 'teste@teste.com',
                ],
                'password' => [
                    'type' => 'string',
                    'example' => 'password',
                ],
            ],
        ]);

        $openApi = $openApi->withSecurity(['cookieAuth' =>[]]);

        return $openApi;
    }
} 