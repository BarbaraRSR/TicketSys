<?php
$title = 'Edit';
require_once "includes/header.php";
require_once 'includes/auth_check.php'; 
require_once "db/conn.php";

$results = $crud->getSpecialties();

if (!isset($_GET['id'])) {
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: dashboard.php");
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

?>

    <h1 class="text-center">Edit Record </h1>

    <!-- GET and POST need the property name to recognize the value that was submitted -->
    <!-- Using GET will post it in the URL, but is really insecure to use this, better use POST -->
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstName" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastName" name="lastname">
        </div>
        <div class=" mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">

                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?php echo $r['specialty_id'] ?>" <?php if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>

                    </option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <a href="viewrecords.php" class="btn btn-info">Back To List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>


<?php } ?>

<?php require_once "includes/footer.php"; ?>