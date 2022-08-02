<?php

namespace App\Utils;

class TranslateControllerActions
{
    /**
     *
     */
    const ACTIONS_LIST = [
        'index' => 'Pesquisar',
        'add' => 'Adicionar',
        'edit' => 'Editar',
        'searchOwners' => 'Pesquisar seus conteúdos',
        'editOwner' => 'Editar seu conteúdo',
        'deleteOwner' => 'Deletar seu conteúdo',
        'delete' => 'Excluir',
        'view' => 'Visualizar',
    ];

    /**
     * @param string $action
     * @return string
     */
    public static function translateAction(string $action) :string
    {
        return key_exists($action, self::ACTIONS_LIST)
            ? self::ACTIONS_LIST[$action]
            : ucfirst($action);
    }

    /**
     *
     */
    const CONTROLLER_LIST = [
        'About' => 'Sobre',
        'BlogsCategories' => 'Categorias de Blog',
        'Levels' => 'Níveis',
        'LogsAccess' => 'Logs de Acesso',
        'LogsChange' => 'Logs de Alterações',
        'SystemParameters' => 'Parâmetros de Sistema',
        'Users' => 'Usuários',
    ];

    /**
     * @param string $controller
     * @return string
     */
    public static function translateController(string $controller) :string
    {
        return key_exists($controller, self::CONTROLLER_LIST)
            ? self::CONTROLLER_LIST[$controller]
            : $controller;
    }
}
/***
 * 400 MB
 * 1 telefone fixo
 * 1 APP com 30 mil filmes
 *
 */
