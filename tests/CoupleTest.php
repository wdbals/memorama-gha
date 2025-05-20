<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../src/core/php/Couple.php";

class CoupleTest extends TestCase
{
    public function testConstructor()
    {
        $concept = "Concepto de prueba";
        $definition = "Definición de prueba";
        $idMatter = 1;

        $couple = new Couple($concept, $definition, $idMatter);

        $this->assertSame($idMatter, $couple->getIdMatter());
        $this->assertSame($concept, $couple->getConcept());
        $this->assertSame($definition, $couple->getDefinition());
    }

    public function testSettersAndGetters()
    {
        $couple = new Couple("Concepto inicial", "Definición inicial", 1);

        $couple->setIdMatter(2);
        $couple->setConcept("Nuevo concepto");
        $couple->setDefinition("Nueva definición");

        $this->assertSame(2, $couple->getIdMatter());
        $this->assertSame("Nuevo concepto", $couple->getConcept());
        $this->assertSame("Nueva definición", $couple->getDefinition());
    }

    public function testToString()
    {
        $concept = "Concepto de prueba";
        $definition = "Definición de prueba";
        $idMatter = 1;
        $couple = new Couple($concept, $definition, $idMatter);

        $expectedOutput = "Concepto: $concept\nDescripcion: $definition\nMateria correspondiente: $idMatter";
        $this->assertSame($expectedOutput, (string) $couple);
    }
}
