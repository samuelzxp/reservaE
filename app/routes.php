<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Model\Usuario;
use App\Model\Organizador;

return function (App $app) {


    // Rotas de API
    $app->group('/api', function (Group $group) {
        // Listar usuários
        $group->get('/usuarios', function (Request $request, Response $response) {
            $usuarios = Usuario::all();
            $response->getBody()->write(json_encode($usuarios));
            return $response->withHeader('Content-Type', 'application/json');
        });
        
        // Listar organizadores
        $group->get('/organizadores', function (Request $request, Response $response) {
            $organizadores = Organizador::all();
            $response->getBody()->write(json_encode($organizadores));
            return $response->withHeader('Content-Type', 'application/json');
        });
        
        // Cadastro
        $group->post('/cadastro', function (Request $request, Response $response) {
            $dados = $request->getParsedBody();

            error_log(print_r($dados, true));
    
            $organizador = Organizador::create($dados);
            

        
            if (!$dados) {
                return $response->withJson([
                    'status' => 'error', 
                    'message' => 'Nenhum dado recebido'
                ], 400);
            }
        
            try {
                $organizadores = Organizador::create($dados);
                return $response->withJson([
                    'status' => 'success', 
                    'message' => 'Usuário cadastrado com sucesso!',
                    'data' => $organizadores
                ]);
            } catch (Exception $e) {
                return $response->withJson([
                    'status' => 'error',
                    'message' => 'Erro ao cadastrar usuário: ' . $e->getMessage()
                ], 500);
            }
        });
    });


    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('API funcionando');
        return $response;
    });

    $app->get('/teste-banco', function () {
        try {
            \Illuminate\Database\Capsule\Manager::connection()->getPdo();
            return "Conexão OK!";
        } catch (\Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    });
};