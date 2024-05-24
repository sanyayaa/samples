<?php
class Guest {
    public $name;
    public $age;
    public $gender;
    public $contactNumber;

    function setName($name) {
        $this->name = $name;
    }

    function setAge($age) {
        // Validate age
        if ($age > 0 && is_numeric($age)) {
            $this->age = $age;
        } else {
            throw new Exception("Age must be a positive integer.");
        }
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setContactNumber($contactNumber) {
        if (preg_match("/^[0-9]{10}$/", $contactNumber)) {
            $this->contactNumber = $contactNumber;
        } else {
            throw new Exception("Invalid contact number format.");
        }
    }

    function display() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Gender: " . $this->gender . "<br>";
        echo "Contact Number: " . $this->contactNumber . "<br>";
    }
}
?>
