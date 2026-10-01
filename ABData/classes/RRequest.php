<?php namespace EC\ABData;
defined('_ESPADA') or die(NO_ACCESS);

use Closure;
use E, EC;

/**
 * @phpstan-type ActionFn \Closure(?CDevice $device, array $args, ?int $schemeVersion, ?int $lastUpdate): array
 */

class RRequest {
    private CDataStore $dataStore;
    /**
     * @var list<array{
     *     fn: ActionFn,
     *     type: "r"|"w",
     * }>
     */
    private array $actions;

    public function __construct(CDataStore $dataStore) {
        $this->dataStore = $dataStore;
        $this->actions = [];
    }

    public function executeAction(?CDevice $device, string $actionName, 
            array $actionArgs, ?int $schemeVersion, ?int $lastUpdate) {
        if (!array_key_exists($actionName, $this->actions))
            throw new \Exception("Action '{$actionName}' does not exists.");

        $result = $this->actions[$actionName]['fn']($device, $actionArgs, 
                $schemeVersion, $lastUpdate);

        if (!EDEBUG) {
            if (array_key_exists("_debug", $result))
                unset($result["_debug"]);
        }
        
        return $result;
    }

    public function getAction(string $actionName): array {
        if (!array_key_exists($actionName, $this->actions))
            throw new \Exception("Action '{$actionName}' does not exists.");

        return $this->actions[$actionName];
    }

    /**
     * 
     * @param string $actionName 
     * @return "r"|"w"
     */
    public function getActionType(string $actionName): string {
        $action = $this->getAction($actionName);

        return $action["type"];
    }

    public function getDS() {
        return $this->getDataStore();
    }

    public function getDataStore() {
        return $this->dataStore;
    }

    public function hasAction(string $actionName) {
        return array_key_exists($actionName, $this->actions);
    }

    /**
     * @param "r"|"w" $type 
     * @param ActionFn $actionFn
     */
    public function setA(string $actionName, string $type, \Closure $actionFn): void {
        $this->setAction($actionName, $type, $actionFn);
    }

    /**
     * @param "r"|"w" $type 
     * @param ActionFn $actionFn 
     */
    public function setAction(string $actionName, string $type, \Closure $actionFn): void {
        if (array_key_exists($actionName, $this->actions))
            throw new \Exception("Action '{$actionName}' already exists.");

        $this->actions[$actionName] = [
            "fn" => $actionFn,
            "type" => $type,
        ];
    }
}