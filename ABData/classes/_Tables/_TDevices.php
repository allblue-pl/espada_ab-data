<?php namespace EC\ABData\_Tables;
defined('_ESPADA') or die(NO_ACCESS);

use E, EC;
use EC\Database;
use EC\Database\MDatabase;
use EC\Database\TTable;

/**
 *
 * @phpstan-type _T_RABData_Devices array{
 *     Id: int,
 *     ItemIds_Last: int,
 *     SystemItemIds_Last: int,
 *     Hash: string,
 *     Expires: float|null,
 *     LastSync: float|null,
 *     DBSync: float|null,
 * }
 */
class _TDevices extends TTable {
    /**
     *
     * @param array $row
     * @return _T_RABData_Devices
     */
    static public function AssertRow(array $row): array {
        /* @phpstan-ignore return.type */
        return $row;
    }

    /**
     *
     * @param array $rows
     * @return array<_T_RABData_Devices>
     */
    static public function AssertRows(array $rows): array {
        return $rows;
    }


    public function __construct(MDatabase $db, $tablePrefix = 'abd_d') {
        parent::__construct($db, 'ABData_Devices', $tablePrefix);

        $this->setColumns([
            'Id' => new Database\FInt(true, false), 
            'ItemIds_Last' => new Database\FInt(true, false), 
            'SystemItemIds_Last' => new Database\FInt(true, false), 
            'Hash' => new Database\FString(true, 64), 
            'Expires' => new Database\FTime(false), 
            'LastSync' => new Database\FTime(false), 
            'DBSync' => new Database\FTime(false), 
        ]);
        $this->setPKs([ 'Id' ]);

    }
}
