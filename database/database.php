<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost';
    $database = 'web_a';
    $user     = 'root';
    $password = '';
        
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// throw if have error catch will get it
        // echo "conected";
        return $db;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    }

/**
 * Create new student record
 */
function createStudent($data) {
    $name = $data['name'] ?? null;
    $age = $data['age'] ?? null;
    $email = $data['email'] ?? null;
    $image_url = $data['image_url'] ?? null;

    // Check if required data is present
    if (!$name || !$age || !$email || !$image_url) {
        // Handle the case where required data is missing
        return false;
    }

    // Use parameterized queries to prevent SQL injection
    $stmt = db()->prepare("INSERT INTO `student`(`name`, `age`, `email`, `profile`) VALUES (:name, :age, :email, :profile)");

    // Check if the prepare statement was successful
    if (!$stmt) {
        // Handle the case where the prepare statement failed
        return false;
    }

    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':profile', $image_url, PDO::PARAM_STR);

    // Execute the query
    $result = $stmt->execute();

    // Return the result of the execution
    return $result;
}


/**
 * Get all data from table student
 */
function selectAllStudents() {
    try {
        $stmt = db()->query("SELECT * FROM `student`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Log or handle the exception according to your needs
        // For example, you can log the error and return an empty array
        error_log("Error selecting all students: " . $e->getMessage());
        return [];
    }
}


/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    try {
        $stmt = db()->prepare("SELECT * FROM `student` WHERE id = ?");
        
        if (!$stmt) {
            throw new Exception("Prepare statement failed");
        }

        $stmt->bindParam(1, $id);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Log or handle the exception according to your needs
        error_log("Error selecting one student: " . $e->getMessage());
        return null;
    }
}


/**
 * Delete student by id
 */
function deleteStudent($id) {
    try {
        $stmt = db()->prepare("DELETE FROM `student` WHERE id = ?");
        
        if (!$stmt) {
            throw new Exception("Prepare statement failed");
        }

        $stmt->bindParam(1, $id);

        return $stmt->execute();
    } catch (Exception $e) {
        // Log or handle the exception according to your needs
        error_log("Error deleting student: " . $e->getMessage());
        return false;
    }
}



/**
 * Update students
 * 
 */
function updateStudent($value_update, $id) {
    try {
        $stmt = db()->prepare("UPDATE `student` SET `name` = :name, `age` = :age, `email` = :email, `profile` = :profile WHERE `id` = :id");
        
        if (!$stmt) {
            throw new Exception("Prepare statement failed");
        }

        $stmt->bindParam(':name', $value_update['name']);
        $stmt->bindParam(':age', $value_update['age']);
        $stmt->bindParam(':email', $value_update['email']);
        $stmt->bindParam(':profile', $value_update['image_url']);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    } catch (Exception $e) {
        // Log or handle the exception according to your needs
        error_log("Error updating student: " . $e->getMessage());
        return false;
    }
}

