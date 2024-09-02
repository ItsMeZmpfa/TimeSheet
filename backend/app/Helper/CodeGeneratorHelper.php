<?php

namespace App\Helper;

use App\Exception\Generator\GeneratorException;
use Generator;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class CodeGeneratorHelper
{
    public static int $limitLength = 6;
    public static int $limitIterations = 100000;

    /**
     * @param  string  $column
     * @param  string  $modelClass
     * @return string
     * @throws GeneratorException|RandomException
     */
    public static function generateUniqueCode(string $modelClass, string $column): string
    {
        return self::run(
            $modelClass,
            $column,
            self::CodeGenerator(),
        );
    }

    /**
     * @param  string  $tableName
     * @param  string  $column
     * @param  Generator  $generator
     * @return string
     * @throws GeneratorException
     */
    protected static function run(string $tableName, string $column, Generator $generator): string
    {
        try {
            $query = DB::table($tableName)->select($column)->get();

                foreach ($generator as $newCode)
                {
                    foreach ($query as $employerCode)
                    if($employerCode->$column == $newCode)
                    {
                        $generator->next();
                    }
                    return $newCode;

            }
        } catch (\Throwable $e) {
            $exceptionMessage = $e->getMessage();
        }

        throw new GeneratorException();

    }

    /**
     * Generate a Code with length of 5
     * @return Generator|null
     * @throws \Random\RandomException
     *
     */
    protected static function CodeGenerator(): ?Generator
    {
        for ($i = 1; $i <= self::$limitIterations; $i++) {
            yield (string)random_int(10000, 99999);
        }
        return null;
    }
}
