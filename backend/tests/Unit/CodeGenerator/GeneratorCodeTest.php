<?php

namespace CodeGenerator;

use App\Exception\Generator\GeneratorException;
use App\Helper\CodeGenerator;
use App\Helper\CodeGeneratorHelper;
use App\Models\Employer;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\Attributes\Test;
use Random\RandomException;
use Tests\TestCase;

class GeneratorCodeTest extends TestCase
{

    private Employer $employer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createEmployer();
    }

    private function createEmployer()
    {
        return Employer::factory(5)->create();
    }

    /**
     * @throws GeneratorException
     * @throws RandomException
     */
    #[NoReturn] #[Test]
    public function testGenerate()
    {
       $codeGen = new CodeGeneratorHelper();
       $result = $codeGen->generateUniqueCode("employers","employerCode");

        $this->assertDatabaseMissing('employers', [
            'employerCode' => $result,
        ]);

    }
}
