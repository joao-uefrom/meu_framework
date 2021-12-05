<?php


class AulaModelo
{
    private int $id;
    private string $aula;
    private string $professor;
    private string $dia;

    public function __construct($registro = false, $id = false)
    {
        if ($registro) {
            $this->id = $registro['id'];
            $this->aula = $registro['aula'];
            $this->professor = $registro['professor'];
            $this->dia = $registro['dia'];
            $id = false;
        }

        if ($id) {
            $sql = "SELECT * FROM aulas WHERE id = :id";
            $stmt = db()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->id = $registro['id'];
                $this->aula = $registro['aula'];
                $this->professor = $registro['professor'];
                $this->dia = $registro['dia'];
            }
        }
    }

    public function setAula($aula): AulaModelo
    {
        $this->aula = $aula;
        return $this;
    }

    public function setProfessor($professor): AulaModelo
    {
        $this->professor = $professor;
        return $this;
    }

    public function setDia($dia): AulaModelo
    {
        $this->dia = $dia;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAula(): string
    {
        return $this->aula;
    }

    public function getProfessor(): string
    {
        return $this->professor;
    }

    public function getDia(): string
    {
        return $this->dia;
    }


    public static function listar(): array
    {
        $sql = "SELECT * FROM aulas";
        $stmt = db()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();

        $aulas = [];

        if ($registros) {
            foreach ($registros as $registro) {
                $aula = new AulaModelo($registro);
                $aulas[] = $aula;
            }

        }

        return $aulas;
    }

    public function adicionar(): AulaModelo
    {
        $sql = "INSERT INTO aulas(aula, professor, dia) VALUES (:aula, :professor, :dia)";

        $stmt = db()->prepare($sql);
        $stmt->bindValue(':aula', $this->aula);
        $stmt->bindValue(':professor', $this->professor);
        $stmt->bindValue(':dia', $this->dia);
        $stmt->execute();

        $this->id = db()->lastInsertId();

        return $this;
    }

    public function excluir()
    {
        if (isset($this->id)) {
            $sql = "DELETE FROM aulas WHERE id = $this->id";

            $stmt = db()->prepare($sql);
            $stmt->execute();
        }
    }

    public function atualizar(): AulaModelo
    {
        $sql = "UPDATE aulas SET aula = :aula, professor = :professor, dia = :dia WHERE id = :id";

        $stmt = db()->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':aula', $this->aula);
        $stmt->bindValue(':professor', $this->professor);
        $stmt->bindValue(':dia', $this->dia);
        $stmt->execute();

        return $this;
    }

}