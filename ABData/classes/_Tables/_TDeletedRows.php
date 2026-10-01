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
 * @phpstan-type _T_TRABData_DeletedRows array{
 *     TableId: int,
 *     RowId: int,
 *     _Modified_DateTime: int,
 * }
 * @phpstan-type _T_TRABData_DeletedRows_Insert array{
 *     TableId: int,
 *     RowId: int,
 *     _Modified_DateTime: int,
 * }
 * @phpstan-type _T_TRABData_DeletedRows_Update array{
 *     TableId?: int,
 *     RowId?: int,
 *     _Modified_DateTime?: int,
 * }
 * @phpstan-type _T_TRABData_DeletedRows_Variant array{
 *     TableId: int,
 *     RowId: int,
 *     _Modified_DateTime: int,
 *     ...<string,mixed>}
 */
class _TDeletedRows extends TTable {
    /**
     *
     * @param _T_TRABData_DeletedRows $row
     * @return _T_TRABData_DeletedRows
     */
    static public function AssertRow(array $row): array {
        return $row;
    }

    /**
     *
     * @param _T_TRABData_DeletedRows_Insert $row
     * @return _T_TRABData_DeletedRows_Insert
     */
    static public function AssertRow_Insert(array $row): array {
        return $row;
    }

    /**
     *
     * @param _T_TRABData_DeletedRows_Update $row
     * @return _T_TRABData_DeletedRows_Update
     */
    static public function AssertRow_Update(array $row): array {
        return $row;
    }

    /**
     *
     * @param list<_T_TRABData_DeletedRows> $rows
     * @return list<_T_TRABData_DeletedRows>
     */
    static public function AssertRows(array $rows): array {
        return $rows;
    }

    // /**
    //  *
    //  * @param array|null $row
    //  * @return _T_TRABData_DeletedRows|null
    //  */
    // static public function CastRow(array|null $row): array|null {
    //     /* phpstan-ignore return.type */
    //     return $row;
    // }

    // /**
    //  *
    //  * @param array $rows
    //  * @return list<_T_TRABData_DeletedRows>
    //  */
    // static public function CastRows(array $rows): array {
    //     return $rows;
    // }

    /**
     *
     * @param _T_TRABData_DeletedRows_Variant $row
     * @return _T_TRABData_DeletedRows
     */
    static public function RawRow(MDatabase $db, array $row): array {
        $table = new _TDeletedRows($db);

        /* @phpstan-ignore return.type */
        return $table->stripRow($row);
    }


    public function __construct(MDatabase $db, $tablePrefix = 'abd_dlr') {
        parent::__construct($db, 'ABData_DeletedRows', $tablePrefix);

        $this->setColumns([
            'TableId' => new Database\FInt(true, false), 
            'RowId' => new Database\FLong(true), 
            '_Modified_DateTime' => new Database\FLong(true), 
        ]);
        $this->setPKs([ 'TableId', 'RowId' ]);


        HABTablesHelper::SetTableVFields($this);
    }

    /** 
     * @return _T_TRABData_DeletedRows|null
     */
     #[Override]
    public function row_ByColumn(string $colName, mixed $colValue, 
            string $groupExtension = '', bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByColumn($colName, $colValue, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_TRABData_DeletedRows|null
     */
    #[Override]
    public function row_ByPKs(array $keys, string $groupExtension = '', 
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_ByPKs($keys, $groupExtension, $forUpdate);
    }

    /** 
     * @return _T_TRABData_DeletedRows|null
     */
    #[Override]
    public function row_Where(array $conditions = [], string $groupExtension = '',
            bool $forUpdate = false): array|null {
        /* @phpstan-ignore return.type */
        return parent::row_Where($conditions, $groupExtension, $forUpdate);
    }

    /** 
     * @return list<_T_TRABData_DeletedRows>
     */
    #[Override]
    public function select_ByPKs(array $pks, string $groupExtension = ''): array {
        return parent::select_ByPKs($pks, $groupExtension);
    }

    /** 
     * @return list<_T_TRABData_DeletedRows>
     */
    #[Override]
    public function select_Where(array $conditions = [], string $groupExtension = '',
            bool $tableOnly = false): array {
        return parent::select_Where($conditions, $groupExtension);
    }

    /** 
     * @return _T_TRABData_DeletedRows
     */
    #[Override]
    public function stripRow_TableColumnsOnly(array $row): array {
        /* @phpstan-ignore return.type */
        return parent::stripRow_TableColumnsOnly($row);
    }
}
