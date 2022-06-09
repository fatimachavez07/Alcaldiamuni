<?php
class usuarios
{
    private $DB;

    function __construct($conn)
    {
        $this -> DB = $conn;
    }

    //Mostrar Todos Los usuarios
    public function Mostrarusuarios($consulta)
    {
        $establecer = $this -> DB -> prepare($consulta);
        $establecer -> execute() > 0;
         
        while($columna = $establecer -> fetch(PDO::FETCH_ASSOC))
        {
            ?> 
            <tr>
            <td><?php echo $columna['idusuario']?></td>
            <td><?php echo $columna['username']?></td>
            <td><?php echo $columna['correo']?></td>
            <td><?php echo $columna['password']?></td>

            <td>
                <a href="modificarusuario.php?EditId=<?php echo $columna['idusuario']?>" class="btn btn-warning">
                    <i class="fa-solid fa-pencil"></i>
                </a>

                <a href="eliminarusuario.php?ElimId=<?php echo $columna['idusuario']?>" class="btn btn-danger">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>
            
        <?php
        } 
    }

    public function Actualizar($id, $nombres, $apellidos, $edad, $numexpediente, $telefono, $dui)
    {
        try
        {
            $establecer = $this -> DB -> prepare("UPDATE pacientes SET nombres=:nombres,
            apellidos=:apellidos, edad=:edad, numexpediente=:numexpediente, telefono=:telefono,
            dui=:dui WHERE idpaciente=:idpaciente");
            $establecer->bindParam(":nombres", $nombres);
            $establecer->bindParam(":apellidos", $apellidos);
            $establecer->bindParam(":edad", $edad);
            $establecer->bindParam(":numexpediente", $numexpediente);
            $establecer->bindParam(":telefono", $telefono);
            $establecer->bindParam(":dui", $dui);
            $establecer->bindParam(":idpaciente", $id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }

    public function Eliminar($id)
    {
        try
        {
            $establecer = $this -> DB -> prepare("DELETE FROM pacientes WHERE idpaciente=:idpaciente");
            $establecer->bindParam(":idpaciente", $id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }
}