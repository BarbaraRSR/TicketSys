<?php
class crud
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database
    public function insertTickets($cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion, $actualizado, $estatus)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO tickets(cliente,correo,telefono,equipo,serie,servicio,estimado,descripcion,actualizado,estatus) VALUES (:cliente,:correo,:telefono,:equipo,:serie,:servicio,:estimado,:descripcion,:actualizado,:estatus)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':cliente', $cliente);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':equipo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            $stmt->bindparam(':actualizado', $actualizado);
            $stmt->bindparam(':estatus', $estatus);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editTicket($folio, $cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion, $actualizado, $estatus)
    {
        try {
            $sql = "UPDATE `tickets` SET `cliente`=:cliente,`correo`=:correo,`telefono`=:telefono,`equipo`=:equipo,`serie`=:serie,`servicio`=:servicio,`estimado`=:estimado,`descripcion`=:descripcion,`actualizado`=:actualizado,`estatus`=:estatus WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':folio', $folio);
            $stmt->bindparam(':cliente', $cliente);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':equipo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            $stmt->bindparam(':actualizado', $actualizado);
            $stmt->bindparam(':estatus', $estatus);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTickets()
    {
        try {
            $sql = "SELECT * FROM `tickets`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTicketDetails($folio)
    {
        try {
            $sql = "SELECT * FROM tickets WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteTicket($folio)
    {
        try {
            $sql = "DELETE FROM tickets WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialtyById($id)
    {
        try {
            $sql = "SELECT * FROM `specialties` where specialty_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>