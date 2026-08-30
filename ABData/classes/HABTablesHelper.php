<?php namespace EC\ABData;
defined('_ESPADA') or die(NO_ACCESS);

use E, EC;

class HABTablesHelper {
    static public $ValidatorInfos = null;


    static public function GetTableValidatorInfo($tableName) {
        if (self::$ValidatorInfos === null) {
            self::$ValidatorInfos = json_decode(file_get_contents(PATH_PRESETS . 
                    '/ABData/tableValidators.json'), true);
        }

        if (!array_key_exists($tableName, self::$ValidatorInfos))
            throw new \Exception("Table '{$tableName}' validator info does not exist.");

        return self::$ValidatorInfos[$tableName];
    }

    static public function SetTableVFields(EC\Database\TTable $table) {
        $columns_ValidatorInfos = self::GetTableValidatorInfo(
                $table->getTableName());

        foreach ($columns_ValidatorInfos as $columnName => $column_ValidatorInfos) {
            $validators = [];
            foreach ($column_ValidatorInfos['validators'] as $validatorInfo)
                $validators[] = self::GetValidator($validatorInfo['type'],
                        $validatorInfo['args']);

            $table->setColumnVFields($columnName, 
                    $column_ValidatorInfos['field']['args']);
            $table->addColumnVFields($columnName, $validators);
        }
    }


    static private function GetValidator($type, $args) {
        if ($type === 'Bool')
            return new EC\Forms\VBool($args);
        else if ($type === 'Date')
            return new EC\Forms\VDate($args);
        else if ($type === 'Email')
            return new EC\Forms\VEmail($args);
        else if ($type === 'File')
            return new EC\Forms\VFile($args);
        else if ($type === 'Float')
            return new EC\Forms\VFloat($args);
        else if ($type === 'Int')
            return new EC\Forms\VInt($args);
        else if ($type === 'Long')
            return new EC\Forms\VLong($args);
        else if ($type === 'Radio')
            return new EC\Forms\VRadio($args);
        else if ($type === 'Text')
            return new EC\Forms\VText($args);
        else if ($type === 'Time')
            return new EC\Forms\VTime($args);

        throw new \Exception("Unknown validator '{$type}'.");
    }
}