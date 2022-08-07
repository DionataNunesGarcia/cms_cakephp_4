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
        'deleteOwner' => 'Deletar seu conteúdo',
        'delete' => 'Excluir',
        'view' => 'Visualizar',
        'searchOwners' => 'Pesquisar seus conteúdos',
        'editOwner' => 'Editar seu conteúdo',
        'enabledDisabled' => 'Habilitar/Desabilitar',
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
        'Contacts' => 'Contatos',
        'ContactsNewsletters' => 'NewsLetters',
        'Events' => 'Eventos',
        'EventsTypes' => 'Tipos de Eventos',
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
