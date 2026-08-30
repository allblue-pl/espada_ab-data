<?php namespace EC\ABData\_Tables;
defined('_ESPADA') or die(NO_ACCESS);

use E, EC;
use EC\ABData\HABTablesHelper;
use EC\Database;
use EC\Database\MDatabase;
use EC\Database\TTable;
use Override;

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
     * @param _T_RABData_Devices $row
     * @return _T_RABData_Devices
     */
    static public function AssertRow(array $row): array {
        return $row;
    }

    /**
     *
     * @param list<_T_RABData_Devices> $rows
     * @return list<_T_RABData_Devices>
     */
    static public function AssertRows(array $rows): array {
        return $rows;
    }

    // /**
    //  *
    //  * @param array|null $row
    //  * @return _T_RABData_Devices|null
    //  */
    // static public function CastRow(array|null $row): array|null {
    //     /* phpstan-ignore return.type */
    //     return $row;
    // }

    // /**
    //  *
    //  * @param array $rows
    //  * @return list<_T_RABData_Devices>
    //  */
    // static public function CastRows(array $rows): array {
    //     return $rows;
    // }


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


        HABTablesHelper::SetTableVFields($this);
    }

    /** 
     * @return _T_RABData_Devices|null
     */
     #[Override]
    public function row_ByColumn(string $colName, mixed $colValue, 
            string $groupExtension = '', bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByColumn($colName, $colValue, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_RABData_Devices|null
     */
    #[Override]
    public function row_ByPKs(array $keys, string $groupExtension = '', 
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByPKs($keys, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_RABData_Devices|null
     */
    #[Override]
    public function row_Where(array $conditions = [], string $groupExtension = '',
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_Where($conditions, $groupExtension, $forUpdate);
    }

    /** 
     * @return list<_T_RABData_Devices>|null
     * @phpstan-ignore return.phpDocType
     */
    #[Override]
    public function select_ByPKs(array $pks, string $groupExtension = ''): array {
        return parent::select_ByPKs($pks, $groupExtension);
    }

    /** 
     * @return list<_T_RABData_Devices>|null
     * @phpstan-ignore return.phpDocType
     */
    #[Override]
    public function select_Where(array $conditions = [], string $groupExtension = '',
            bool $tableOnly = false): array {
        return parent::select_Where($conditions, $groupExtension);
    }

    /** 
     * @return _T_RABData_Devices
     */
    #[Override]
    public function stripRow_TableColumnsOnly(array $row): array {
        /* @phpstan-ignore return.type */
        return parent::stripRow_TableColumnsOnly($row);
    }
}
