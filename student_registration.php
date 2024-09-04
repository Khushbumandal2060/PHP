<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <h1>Student Registration Form</h1>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Enter full name">
            <p><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
            
            <label for="fname">Father's Name: </label>
            <input type="text" id="fname" name="fname">
            <p><?php echo isset($error['fname']) ? $error['fname'] : ''; ?></p>
            
            <label for="mname">Mother's Name: </label>
            <input type="text" id="mname" name="mname">
            <p><?php echo isset($error['mname']) ? $error['mname'] : ''; ?></p>
            
            <label for="pnum">Phone Number: </label>
            <input type="text" id="pnum" name="pnum">
            <p><?php echo isset($error['pnum']) ? $error['pnum'] : ''; ?></p>
            
            <label for="email">Email: </label>
            <input type="text" id="email" name="email">
            <p><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
            
            <label>Gender: </label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label>
            <p><?php echo isset($error['gender']) ? $error['gender'] : ''; ?></p>
            
            <div class="form">
                <label>Date Of Birth: </label>
                <input type="text" id="dob" name="dob" placeholder="YYYY-MM-DD">
                <p><?php echo isset($error['dob']) ? $error['dob'] : ''; ?></p>
            </div>
            
            <label for="address">Address: </label>
            <input type="text" id="address" name="address">
            <p><?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
            
            <label>Blood Group: </label>
            <select name="blood">
                <option value="">Select</option>
                <option value="A Group">A Group</option>
                <option value="B Group">B Group</option>
                <option value="O Group">O Group</option>
                <option value="AB group">AB Group</option>
            </select>
            <p><?php echo isset($error['blood']) ? $error['blood'] : ''; ?></p>
            
            <label>Department: </label>
            <input type="radio" id="cse" name="department" value="CSE">
            <label for="cse">CSE</label>
            <input type="radio" id="eee" name="department" value="EEE">
            <label for="eee">EEE</label>
            <input type="radio" id="bba" name="department" value="BBA">
            <label for="bba">BBA</label>
            <p><?php echo isset($error['department']) ? $error['department'] : ''; ?></p>
            
            <label>Course(s): </label>
            <input type="checkbox" id="c" name="course[]" value="C">
            <label for="c">C</label>
            <input type="checkbox" id="c++" name="course[]" value="C++">
            <label for="c++">C++</label>
            <input type="checkbox" id="java" name="course[]" value="Java">
            <label for="java">Java</label>
            <input type="checkbox" id="ai" name="course[]" value="AI">
            <label for="ai">AI</label>
            <input type="checkbox" id="machinelearning" name="course[]" value="Machine Learning">
            <label for="machinelearning">Machine Learning</label>
            <input type="checkbox" id="robotics" name="course[]" value="Robotics">
            <label for="robotics">Robotics</label>
            <p><?php echo isset($error['course']) ? $error['course'] : ''; ?></p>
            
            <label for="photo">Photo: </label>
            <input type="file" id="photo" name="photo">
            <p><?php echo isset($error['photo']) ? $error['photo'] : ''; ?></p>
            <br><br>
            
            <button type="submit" name="submit">Submit</button>
            <button type="reset" name="reset">Reset</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = [];
            $success = false;

            // Perform validation for each field
            if (empty($_POST['name'])) {
                $error['name'] = 'Name is required.';
            }
            if (empty($_POST['fname'])) {
                $error['fname'] = 'Father\'s Name is required.';
            }
            if (empty($_POST['mname'])) {
                $error['mname'] = 'Mother\'s Name is required.';
            }
            if (empty($_POST['address'])) {
                $error['address'] = 'Address is required.';
            }
            if (empty($_POST['email'])) {
                $error['email'] = 'Email is required.';
            }
            if (empty($_POST['blood'])) {
                $error['blood'] = 'Blood Group is required.';
            }
            if (empty($_POST['pnum'])) {
                $error['pnum'] = 'Phone number is required.';
            }
            if (empty($_POST['gender'])) {
                $error['gender'] = 'Gender is required.';
            }
            if (empty($_POST['course'])) {
                $error['course'] = 'Course is required.';
            }
            if (empty($_POST['department'])) {
                $error['department'] = 'Department is required.';
            }
            if (empty($_POST['dob'])) {
                $error['dob'] = 'Date of Birth is required.';
            }

            // Image validation
            if (!empty($_FILES['photo']['name'])) {
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                $max_size = 2 * 1024 * 1024; // 2 MB
                $file_type = $_FILES['photo']['type'];
                $file_size = $_FILES['photo']['size'];

                if (!in_array($file_type, $allowed_types)) {
                    $error['photo'] = 'Only JPEG, PNG, and GIF formats are allowed.';
                }
                if ($file_size > $max_size) {
                    $error['photo'] = 'File size should not exceed 2 MB.';
                }
            } else {
                $error['photo'] = 'Photo is required.';
            }

            // Check if there are no validation errors
            if (empty($error)) {
                // Connect to the database
                $connection = new mysqli('localhost', 'root', '', 'projects'); //change here with the database details 
                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Prepare and bind SQL statement using prepared statement to prevent SQL injection
                $stmt = $connection->prepare("INSERT INTO students (name, fname, mname, address, phone, email, course, department, gender, blood, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssssss", $name, $fname, $mname, $address, $phone, $email, $course, $department, $gender, $blood, $dob);

                // Set parameters and execute statement
                $name = $_POST['name'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $address = $_POST['address'];
                $phone = $_POST['pnum'];
                $email = $_POST['email'];
                $course = implode(',', $_POST['course']); // Assuming course is stored as comma-separated values
                $department = $_POST['department'];
                $gender = $_POST['gender'];
                $blood = $_POST['blood'];
                $dob = $_POST['dob'];

                if ($stmt->execute()) {
                    $success = true;
                } else {
                    $error['form'] = 'Submit failed.';
                }

                $stmt->close();
                $connection->close();
            }
        }
        ?>

        <?php if (isset($success) && $success): ?>
            <div class="message success">Student Registration Successful</div>
        <?php elseif (!empty($error)): ?>
            <div class="message error"><?php echo implode('<br>', $error); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
