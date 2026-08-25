<?php namespace EC\ABData\_Tables;
defined('_ESPADA') or die(NO_ACCESS);

use E, EC;
use EC\Database;
use EC\Database\MDatabase;
use EC\Database\TTable;

/**
 *
 * @phpstan-type _T_RABData_DeviceRequests array{
 *     DeviceId: int,
 *     RequestId: int,
 * }
 */
class _TDeviceRequests extends TTable {
    /**
     *
     * @param array $row
     * @return _T_RABData_DeviceRequests
     */
    static public function AssertRow(array $row): array {
        /* @phpstan-ignore return.type */
        return $row;
    }

    /**
     *
     * @param array $rows
     * @return array<_T_RABData_DeviceRequests>
     */
    static public function AssertRows(array $rows): array {
        return $rows;
    }


    public function __construct(MDatabase $db, $tablePrefix = 'abd_drq') {
        parent::__construct($db, 'ABData_DeviceRequests', $tablePrefix);

        $this->setColumns([
            'DeviceId' => new Database\FInt(true, false), 
            'RequestId' => new Database\FInt(true, false), 
        ]);
        $this->setPKs([ 'DeviceId', 'RequestId' ]);

    }
}
