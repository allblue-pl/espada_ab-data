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
 * @phpstan-type _T_TRABData_DeviceRows array{
 *     DeviceId: int,
 *     TableId: int,
 *     RowId: float,
 * }
 * @phpstan-type _T_TRABData_DeviceRows_Insert array{
 *     DeviceId: int,
 *     TableId: int,
 *     RowId: float,
 * }
 * @phpstan-type _T_TRABData_DeviceRows_Update array{
 *     DeviceId?: int,
 *     TableId?: int,
 *     RowId?: float,
 * }
 * @phpstan-type _T_TRABData_DeviceRows_Variant array{
 *     DeviceId: int,
 *     TableId: int,
 *     RowId: float,
 *     ...<string,mixed>}
 */
class _TDeviceRows extends TTable {
    /**
     *
     * @param _T_TRABData_DeviceRows $row
     * @return _T_TRABData_DeviceRows
     */
    static public function AssertRow(array $row): array {
        return $row;
    }

    /**
     *
     * @param _T_TRABData_DeviceRows_Insert $row
     * @return _T_TRABData_DeviceRows_Insert
     */
    static public function AssertRow_Insert(array $row): array {
        return $row;
    }

    /**
     *
     * @param _T_TRABData_DeviceRows_Update $row
     * @return _T_TRABData_DeviceRows_Update
     */
    static public function AssertRow_Update(array $row): array {
        return $row;
    }

    /**
     *
     * @param list<_T_TRABData_DeviceRows> $rows
     * @return list<_T_TRABData_DeviceRows>
     */
    static public function AssertRows(array $rows): array {
        return $rows;
    }

    // /**
    //  *
    //  * @param array|null $row
    //  * @return _T_TRABData_DeviceRows|null
    //  */
    // static public function CastRow(array|null $row): array|null {
    //     /* phpstan-ignore return.type */
    //     return $row;
    // }

    // /**
    //  *
    //  * @param array $rows
    //  * @return list<_T_TRABData_DeviceRows>
    //  */
    // static public function CastRows(array $rows): array {
    //     return $rows;
    // }

    /**
     *
     * @param _T_TRABData_DeviceRows_Variant $row
     * @return _T_TRABData_DeviceRows
     */
    static public function RawRow(MDatabase $db, array $row): array {
        $table = new _TDeviceRows($db);

        /* @phpstan-ignore return.type */
        return $table->stripRow($row);
    }


    public function __construct(MDatabase $db, $tablePrefix = 'abd_dvr') {
        parent::__construct($db, 'ABData_DeviceRows', $tablePrefix);

        $this->setColumns([
            'DeviceId' => new Database\FInt(true, false), 
            'TableId' => new Database\FInt(true, false), 
            'RowId' => new Database\FLong(true), 
        ]);
        $this->setPKs([ 'DeviceId', 'TableId', 'RowId' ]);


        HABTablesHelper::SetTableVFields($this);
    }

    /** 
     * @return _T_TRABData_DeviceRows|null
     */
     #[Override]
    public function row_ByColumn(string $colName, mixed $colValue, 
            string $groupExtension = '', bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByColumn($colName, $colValue, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_TRABData_DeviceRows|null
     */
    #[Override]
    public function row_ByPKs(array $keys, string $groupExtension = '', 
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByPKs($keys, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_TRABData_DeviceRows|null
     */
    #[Override]
    public function row_Where(array $conditions = [], string $groupExtension = '',
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_Where($conditions, $groupExtension, $forUpdate);
    }

    /** 
     * @return list<_T_TRABData_DeviceRows>
     */
    #[Override]
    public function select_ByPKs(array $pks, string $groupExtension = ''): array {
        return parent::select_ByPKs($pks, $groupExtension);
    }

    /** 
     * @return list<_T_TRABData_DeviceRows>
     */
    #[Override]
    public function select_Where(array $conditions = [], string $groupExtension = '',
            bool $tableOnly = false): array {
        return parent::select_Where($conditions, $groupExtension);
    }

    /** 
     * @return _T_TRABData_DeviceRows
     */
    #[Override]
    public function stripRow_TableColumnsOnly(array $row): array {
        /* @phpstan-ignore return.type */
        return parent::stripRow_TableColumnsOnly($row);
    }
}
