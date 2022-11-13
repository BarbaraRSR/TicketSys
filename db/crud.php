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
    public function insertTickets($clienteid, $tipo, $marca, $modelo, $serie, $servicio, $estimado, $descripcion)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO tickets(clienteid,tipo,marca,modelo,serie,servicio,estimado,descripcion) VALUES (:clienteid,:tipo,:marca,:modelo,:serie,:servicio,:estimado,:descripcion)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':clienteid', $cliente);
            $stmt->bindparam(':tipo', $correo);
            $stmt->bindparam(':marca', $telefono);
            $stmt->bindparam(':modelo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /* ESTO NO PARECE FORMAR PARTE DE NUESTRO SISTEMA
    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } */

    public function getClients()
    {
        try {
            $sql = "SELECT * FROM clients";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTickets()
    {
        try {
            $sql = "SELECT * FROM tickets WHERE estatus = 'abierto'";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getHistory()
    {
        try {
            $sql = "SELECT folio, fecha, tipo, marca, modelo, servicio, estimado, estatus, clients.clienteid, clients.nombre, clients.apellido
                        FROM tickets
                        INNER JOIN clients ON tickets.clienteid=clients.clienteid;";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getClientDetails($clienteid)
    {
        try {
            $sql = "SELECT * FROM clients WHERE clienteid = :clienteid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':clienteid', $clienteid);
            $stmt->execute();
            $result = $stmt->fetch();
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


    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
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



    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE FROM attendee WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /* ESTO NO PARECE SER PARTE DE NUESTRO SISTEMA
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
    } */
}

?>