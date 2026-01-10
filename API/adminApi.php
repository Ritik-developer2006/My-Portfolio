<?php
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
header('Content-Type: application/json; charset=utf-8');

include_once('../connection/mysqlconnection.php');

// If POST is empty, try to read JSON and map it to $_POST
if (empty($_POST)) {
    $rawInput = file_get_contents("php://input");
    $jsonData = json_decode($rawInput, true);

    if (is_array($jsonData)) {
        $_POST = $jsonData;
    }
}

// Now safely use $_POST everywhere
$method = $_POST['method'] ?? '';

class AdminApi
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function connect_to_mysqlsms()
    {
        return $this->db;
    }

    // Fetch all educations records
    public function getAlleducation()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_education");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Education records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch all experiences records
    public function getAllexperiences()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_experiences");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Experiences records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch all experiences records
    public function getAllSkills()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_skills");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Skills records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single experience records by id
    public function getSingleExperience($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_experiences WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Experiences records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Testimonials records
    public function getAllTestimonials()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_testimonials");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Testimonials records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Services records
    public function getAllServices()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_services");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Services records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Testimonials records by id
    public function getSingleTestimonial($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_testimonials WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Testimonials records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single education records by id
    public function getSingleEducation($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_education WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Education records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single education records by id
    public function getSingleService($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_services WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Service records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch About us records
    public function getAboutUs()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM about_us LIMIT 1");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'About Us record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch User Messages records
    public function getUserMessages()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM user_message");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'User Messages record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Basic Details records
    public function getBasicDetail()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM basic_detail LIMIT 1");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Basic record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Project Details records
    public function getAllProject()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT tp.*,tf.name FROM tbl_project as tp LEFT JOIN tbl_data_filter as tf on tf.id = tp.data_filter_id");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Basic record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Project Details records
    public function getSingleProject($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_project where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Project Filter Details records
    public function getProjectFilter()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_data_filter");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project filter record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Project Details records
    public function getSingleProjectFilter($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_data_filter where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project filter record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Blog Details records
    public function getSingleBlog($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_blogs where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Blog Details records
    public function getAllBlogs()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_blogs");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Menu Details records
    public function getSingleMenu($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_menu where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Menu Details records
    public function getAllMenu()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_menu");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Sliders Details records
    public function getSingleSlider($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_sliders_name where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Sliders Details records
    public function getAllSlider()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_sliders_name");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    public function getContactPage()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_contact_text");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Contact text record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Logo & Background image from front page Detail records
    public function getLogoBck()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_logo_bck");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // LogIn admin
    public function logIn($username, $password)
    {
        $smslink = $this->connect_to_mysqlsms();

        $stmt = $smslink->prepare(
            "SELECT id, username, password FROM tbl_admin WHERE username = ? LIMIT 1"
        );

        $stmt->bind_param("s", $username);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        // print_r($result);
        // die;
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify hashed password
            // if (password_verify($password, $row['password'])) {

            // Verify real password
            if ($password == $row['password']) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['isLogin']  = true;
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                echo json_encode([
                    'status' => 1,
                    'msg' => 'Login successfully'
                ]);
                die;
            }
        }

        echo json_encode([
            'status' => 0,
            'msg' => 'Incorrect Username or Password'
        ]);
        die;
    }

    // update Single Testimonial records
    public function updateTestimonial()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id          = $_POST['testimonial_id'];
        $full_name   = $_POST['full_name'];
        $email       = $_POST['email'];
        $subject     = $_POST['subject'];
        $description = $_POST['description'];
        $oldPhoto    = "";
        // Get old image name
        $oldImgStmt = $smslink->prepare(
            "SELECT photo FROM tbl_testimonials WHERE id = ?"
        );
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($oldPhoto);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        $newPhotoName = $oldPhoto;

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {

            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid image format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $newPhotoName = 'testimonial_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../assets/user_images/" . $newPhotoName;

            // Move file
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Image upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_testimonials SET full_name = ?, email = ?, subject = ?, description = ?, photo = ? WHERE id = ?");

        $stmt->bind_param("sssssi", $full_name, $email, $subject, $description, $newPhotoName, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Testimonial updated successfully'
        ]);
        die;
    }

    // update Single Testimonial records
    public function updateBasic()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id             = $_POST['basic_id'];
        $heading        = $_POST['heading'];
        $twitter_link   = $_POST['twitter_link'];
        $instagram_link = $_POST['instagram_link'];
        $linkdin_link   = $_POST['linkdin_link'];
        $github_link    = $_POST['github_link'];
        $facebook_link  = $_POST['facebook_link'];
        $description    = $_POST['description'];
        $oldPhoto       = "";
        // Get old image name
        $oldImgStmt = $smslink->prepare(
            "SELECT image FROM about_us WHERE id = ?"
        );
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($oldPhoto);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        $newPhotoName = $oldPhoto;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid image format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $newPhotoName = 'about_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../img/" . $newPhotoName;

            // Move file
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Image upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE about_us SET heading = ?, description = ?, image = ?, twitter_link = ?, instagram_link = ?, linkdin_link = ?, github_link = ?, facebook_link = ? WHERE id = ?");

        $stmt->bind_param("ssssssssi", $heading, $description, $newPhotoName, $twitter_link, $instagram_link, $linkdin_link, $github_link, $facebook_link, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Details updated successfully'
        ]);
        die;
    }

    // update Single Project records
    public function updateProject()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id             = $_POST['project_id'];
        $project_name   = $_POST['project_name'];
        $link           = $_POST['link'];
        $data_filter_id = $_POST['data_filter_id'];
        $description    = $_POST['description'];
        $oldPhoto       = "";
        // Get old image name
        $oldImgStmt = $smslink->prepare("SELECT images FROM tbl_project WHERE id = ?");
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($oldPhoto);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        $newPhotoName = $oldPhoto;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid image format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $newPhotoName = 'project_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../img/" . $newPhotoName;

            // Move file
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Image upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_project SET project_name = ?, link = ?, images = ?, data_filter_id = ?, description = ? WHERE id = ?");

        $stmt->bind_param("sssssi", $project_name, $link, $newPhotoName, $data_filter_id, $description, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Details updated successfully'
        ]);
        die;
    }

    // update Single Project records
    public function updateBlog()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id               = $_POST['blog_id'];
        $blog_title       = $_POST['blog_title'];
        $description      = $_POST['description'];
        $full_detail      = $_POST['full_detail'];
        $old_card_image   = "";
        $old_document     = "";
        $old_video        = "";
        $old_multiple_img = "";

        // Get old image name
        $oldImgStmt = $smslink->prepare("SELECT card_image, document, video, multiple_img FROM tbl_blogs WHERE id = ?");
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($old_card_image, $old_document, $old_video, $old_multiple_img);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        // print_r($old_card_image);
        // die;
        $new_card_image   = $old_card_image;
        $new_document     = $old_document;
        $new_video        = $old_video;
        $new_multiple_img = $old_multiple_img;

        // for blog card image
        if (isset($_FILES['card_image']) && $_FILES['card_image']['error'] === 0) {

            $ext = pathinfo($_FILES['card_image']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid image format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $new_card_image = 'cardImage_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../blog_img/" . $new_card_image;

            // Move file
            if (!move_uploaded_file($_FILES['card_image']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Image upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // for blog attachment
        if (isset($_FILES['document']) && $_FILES['document']['error'] === 0) {

            $ext = pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
            $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid document format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $new_document = 'blogDocument_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../blog_attachment/" . $new_document;

            // Move file
            if (!move_uploaded_file($_FILES['document']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Document upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // for blog video
        if (isset($_FILES['video']) && $_FILES['video']['error'] === 0) {

            $ext = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
            $allowed = ['mp4', 'ogg', 'webm', 'avi', 'mov', 'mpeg', 'mpg'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid video format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $new_video = 'blogVideo_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../blog_video/" . $new_video;

            // Move file
            if (!move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Video upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // print_r($_FILES['multiple_img']);
        // for blog multiple images
        if (isset($_FILES['multiple_img']) && !empty($_FILES['multiple_img']['name'])) {

            $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
            $uploadedImages = [];

            foreach ($_FILES['multiple_img']['name'] as $key => $name) {

                if ($_FILES['multiple_img']['error'][$key] !== 0) {
                    continue;
                }

                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExt)) {
                    echo json_encode([
                        'status' => 0,
                        'msg' => 'Invalid image format'
                    ]);
                    die;
                }

                // Generate unique filename
                $newName = 'blogImg_' . time() . '_' . rand(100, 999) . '.' . $ext;
                $uploadPath = "../blog_img/" . $newName;

                if (move_uploaded_file($_FILES['multiple_img']['tmp_name'][$key], $uploadPath)) {
                    $uploadedImages[] = $newName;
                }
            }

            // Convert array to comma-separated string
            $new_multiple_img = implode(',', $uploadedImages);
        }
        // print_r($new_multiple_img);
        // die;


        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_blogs SET title = ?, card_image = ?, document = ?, description = ?, full_detail = ?, multiple_img = ?, video = ? WHERE id = ?");

        $stmt->bind_param("sssssssi", $blog_title, $new_card_image, $new_document, $description, $full_detail, $new_multiple_img, $new_video, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog updated successfully'
        ]);
        die;
    }

    // update Single Project records
    public function updateLogo()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id             = $_POST['logo_id'];
        $oldPhoto       = "";
        // Get old image name
        $oldImgStmt = $smslink->prepare("SELECT logo FROM tbl_logo_bck WHERE id = ?");
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($oldPhoto);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        $newPhotoName = $oldPhoto;

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {

            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid logo format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $newPhotoName = 'logo_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../img/favicons/" . $newPhotoName;

            // Move file
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'logo upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_logo_bck SET logo = ? WHERE id = ?");

        $stmt->bind_param("si", $newPhotoName, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Logo updated successfully'
        ]);
        die;
    }

    // update Single Project records
    public function updateBck()
    {
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id             = $_POST['bck_id'];
        $oldPhoto       = "";
        // Get old image name
        $oldImgStmt = $smslink->prepare("SELECT bck_img FROM tbl_logo_bck WHERE id = ?");
        $oldImgStmt->bind_param("i", $id);
        $oldImgStmt->execute();
        $oldImgStmt->bind_result($oldPhoto);
        $oldImgStmt->fetch();
        $oldImgStmt->close();

        $newPhotoName = $oldPhoto;

        if (isset($_FILES['bck']) && $_FILES['bck']['error'] === 0) {

            $ext = pathinfo($_FILES['bck']['name'], PATHINFO_EXTENSION);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($ext), $allowed)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Invalid background image format'
                ]);
                die;
            }

            // Generate UNIQUE filename
            $newPhotoName = 'bck_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $uploadPath = "../img/" . $newPhotoName;

            // Move file
            if (!move_uploaded_file($_FILES['bck']['tmp_name'], $uploadPath)) {
                echo json_encode([
                    'status' => 0,
                    'msg' => 'Image upload failed'
                ]);
                die;
            }

            // // Delete old image (optional but recommended)
            // if (!empty($oldPhoto) && file_exists("../img/" . $oldPhoto)) {
            //     unlink("../img/" . $oldPhoto);
            // }
        }

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_logo_bck SET bck_img = ? WHERE id = ?");

        $stmt->bind_param("si", $newPhotoName, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Background image updated successfully'
        ]);
        die;
    }

    // update Single Service records
    public function updateService()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id          = $_POST['service_id'];
        $heading     = $_POST['heading'];
        $icon        = $_POST['icon'];
        $description = $_POST['description'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_services SET icon = ?, heading = ?, description = ? WHERE id = ?");

        $stmt->bind_param("sssi", $icon, $heading, $description, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Service updated successfully'
        ]);
        die;
    }

    // update Single Category records
    public function updateCategory()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id       = $_POST['category_id'];
        $category = $_POST['category'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_data_filter SET name = ? WHERE id = ?");

        $stmt->bind_param("si", $category, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Category updated successfully'
        ]);
        die;
    }

    // update Single Service records
    public function updateSkill()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id             = $_POST['skill_id'];
        $skill          = $_POST['skill'];
        $per_knowledge  = $_POST['per_knowledge'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_skills SET skill = ?, per_knowledge = ? WHERE id = ?");

        $stmt->bind_param("ssi", $skill, $per_knowledge, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Skill updated successfully'
        ]);
        die;
    }

    // update Single Menu records
    public function updateMenu()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id            = $_POST['menu_id'];
        $name          = $_POST['name'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_menu SET name = ? WHERE id = ?");

        $stmt->bind_param("si", $name, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Menu updated successfully'
        ]);
        die;
    }

    // update Single Menu records
    public function updateSlider()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id   = $_POST['slider_id'];
        $name = $_POST['name'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_sliders_name SET name = ? WHERE id = ?");

        $stmt->bind_param("si", $name, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Slider updated successfully'
        ]);
        die;
    }

    // update Contact Page records
    public function updateContactPage()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id              = $_POST['text_id'];
        $message_heading = $_POST['message_heading'];
        $contact_heading = $_POST['contact_heading'];
        $description     = $_POST['description'];
        $label1          = $_POST['label1'];
        $label2          = $_POST['label2'];
        $label3          = $_POST['label3'];
        $label4          = $_POST['label4'];
        $label1_icon     = $_POST['label1_icon'];
        $label2_icon     = $_POST['label2_icon'];
        $label3_icon     = $_POST['label3_icon'];
        $label4_icon     = $_POST['label4_icon'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_contact_text SET message_heading = ?, contact_heading = ?, description = ?, label1 = ?, label2 = ?, label3 = ?, label4 = ?, label1_icon = ?, label2_icon = ?, label3_icon = ?, label4_icon = ?  WHERE id = ?");

        $stmt->bind_param("sssssssssssi", $message_heading, $contact_heading, $description, $label1, $label2, $label3, $label4, $label1_icon, $label2_icon, $label3_icon, $label4_icon, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Contact text updated successfully'
        ]);
        die;
    }

    // update Contact Detail records
    public function updateContactDetail()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id         = $_POST['contact_id'];
        $full_name  = $_POST['full_name'];
        $address    = $_POST['address'];
        $state      = $_POST['state'];
        $country    = $_POST['country'];
        $age        = $_POST['age'];
        $number     = $_POST['number'];
        $email      = $_POST['email'];

        // Update Contact record
        $stmt = $smslink->prepare("UPDATE basic_detail SET full_name = ?, email = ?, number = ?, age = ?, country = ?, state = ?, address = ? WHERE id = ?");

        $stmt->bind_param("sssssssi", $full_name, $email, $number, $age, $country, $state, $address, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Contact updated successfully'
        ]);
        die;
    }

    // delete Single Menu records
    public function deleteMenu($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_menu where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Menu deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Slider records
    public function deleteSlider($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_sliders_name where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Slider deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // Delete single blog records
    public function deleteBlog($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_blogs where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Blog deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // update Single Experince records
    public function updateExperience()
    {
        // print_r($_POST);
        // die;
        $smslink = $this->connect_to_mysqlsms();

        $id           = $_POST['experience_id'];
        $job_title    = $_POST['job_title'];
        $company_name = $_POST['company_name'];
        $from_year    = $_POST['from_year'];
        $to_year      = $_POST['to_year'];
        $description  = $_POST['description'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_experiences SET job_title = ?, company_name = ?, from_year = ?, to_year = ?, description = ? WHERE id = ?");

        $stmt->bind_param("sssssi", $job_title, $company_name, $from_year, $to_year, $description, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Experince updated successfully'
        ]);
        die;
    }

    // update Single Service records
    public function updateEducation()
    {
        print_r($_POST);
        die;
        $smslink = $this->connect_to_mysqlsms();

        $id              = $_POST['education_id'];
        $education_name  = $_POST['education_name'];
        $university      = $_POST['university'];
        $college         = $_POST['college'];
        $from_year       = $_POST['from_year'];
        $to_year         = $_POST['to_year'];
        $description     = $_POST['description'];

        // Update Testimonial record
        $stmt = $smslink->prepare("UPDATE tbl_education SET education_name = ?, university = ?, from_year = ?, to_year = ?, college_name = ?, description = ? WHERE id = ?");

        $stmt->bind_param("ssssssi", $education_name, $university, $from_year, $to_year, $college, $description, $id);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Education updated successfully'
        ]);
        die;
    }

    // delete Single Testimonial records
    public function deleteTestimonial($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_testimonials where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Testimonial deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Category records
    public function deleteCategory($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_data_filter where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Category deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Education records
    public function deleteEducation($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_education where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Education deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Experience records
    public function deleteExperience($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_experiences where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Experience deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Skill records
    public function deleteSkill($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_skills where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Skill deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Project records
    public function deleteProject($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_project where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Project deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // delete Single Service records
    public function deleteService($id)
    {
        // print_r($id);
        // die;
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("DELETE FROM tbl_services where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 1,
                'msg' => 'Service deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'No record found to delete'
            ]);
        }
        $stmt->close();
        die;
    }

    // LogOut admin
    public function logOut()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        echo json_encode([
            'status' => 1,
            'msg' => 'Logout successful'
        ]);
        die;
    }
}

$user_obj = new AdminApi($conn);

switch ($method) {
    case 'getAlleducation':
        $user_obj->getAlleducation();
        break;

    case 'getAllexperiences':
        $user_obj->getAllexperiences();
        break;

    case 'getAllSkills':
        $user_obj->getAllSkills();
        break;

    case 'getSingleExperience':
        $id = $_POST['id'];
        $user_obj->getSingleExperience($id);
        break;

    case 'getSingleEducation':
        $id = $_POST['id'];
        $user_obj->getSingleEducation($id);
        break;

    case 'getAllTestimonials':
        $user_obj->getAllTestimonials();
        break;

    case 'getSingleTestimonial':
        $id = $_POST['id'];
        $user_obj->getSingleTestimonial($id);
        break;

    case 'getAllServices':
        $user_obj->getAllServices();
        break;

    case 'getSingleService':
        $id = $_POST['id'];
        $user_obj->getSingleService($id);
        break;

    case 'getAboutUs':
        $user_obj->getAboutUs();
        break;

    case 'getUserMessages':
        $user_obj->getUserMessages();
        break;

    case 'getBasicDetail':
        $user_obj->getBasicDetail();
        break;

    case 'getAllProject':
        $user_obj->getAllProject();
        break;

    case 'getProjectFilter':
        $user_obj->getProjectFilter();
        break;

    case 'getSingleProjectFilter':
        $id = $_POST['id'];
        $user_obj->getSingleProjectFilter($id);
        break;

    case 'getSingleProject':
        $id = $_POST['id'];
        $user_obj->getSingleProject($id);
        break;

    case 'getAllBlogs':
        $user_obj->getAllBlogs();
        break;

    case 'getSingleBlog':
        $id = $_POST['id'];
        $user_obj->getSingleBlog($id);
        break;

    case 'logIn':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_obj->logIn($username, $password);
        break;

    case 'logOut':
        $user_obj->logOut();
        break;

    case 'getAllMenu':
        $user_obj->getAllMenu();
        break;

    case 'getSingleMenu':
        $id = $_POST['id'];
        $user_obj->getSingleMenu($id);
        break;

    case 'getAllSlider':
        $user_obj->getAllSlider();
        break;

    case 'getSingleSlider':
        $id = $_POST['id'];
        $user_obj->getSingleSlider($id);
        break;

    case 'getLogoBck':
        $user_obj->getLogoBck();
        break;

    case 'updateTestimonial':
        $user_obj->updateTestimonial();
        break;

    case 'deleteTestimonial':
        $id = $_POST['id'];
        $user_obj->deleteTestimonial($id);
        break;

    case 'updateService':
        $user_obj->updateService();
        break;

    case 'deleteService':
        $id = $_POST['id'];
        $user_obj->deleteService($id);
        break;

    case 'deleteEducation':
        $id = $_POST['id'];
        $user_obj->deleteEducation($id);
        break;

    case 'updateEducation':
        $user_obj->updateEducation();
        break;

    case 'deleteExperience':
        $id = $_POST['id'];
        $user_obj->deleteExperience($id);
        break;

    case 'updateExperience':
        $user_obj->updateExperience();
        break;

    case 'deleteSkill':
        $id = $_POST['id'];
        $user_obj->deleteSkill($id);
        break;

    case 'updateSkill':
        $user_obj->updateSkill();
        break;

    case 'updateBasic':
        $id = $_POST['id'];
        $user_obj->updateBasic($id);
        break;

    case 'updateCategory':
        $user_obj->updateCategory();
        break;

    case 'updateProject':
        $user_obj->updateProject();
        break;

    case 'deleteProject':
        $id = $_POST['id'];
        $user_obj->deleteProject($id);
        break;

    case 'deleteCategory':
        $id = $_POST['id'];
        $user_obj->deleteCategory($id);
        break;

    case 'updateMenu':
        $user_obj->updateMenu();
        break;

    case 'deleteMenu':
        $id = $_POST['id'];
        $user_obj->deleteMenu($id);
        break;

    case 'updateSlider':
        $user_obj->updateSlider();
        break;

    case 'deleteSlider':
        $id = $_POST['id'];
        $user_obj->deleteSlider($id);
        break;

    case 'updateBck':
        $user_obj->updateBck();
        break;

    case 'deleteBlog':
        $id = $_POST['id'];
        $user_obj->deleteBlog($id);
        break;

    case 'updateBlog':
        $user_obj->updateBlog();
        break;

    case 'updateLogo':
        $user_obj->updateLogo();
        break;

    case 'getContactPage':
        $user_obj->getContactPage();
        break;

    case 'updateContactPage':
        $user_obj->updateContactPage();
        break;

    case 'updateContactDetail':
        $user_obj->updateContactDetail();
        break;
    default:
        echo json_encode([
            'status' => 0,
            'msg' => 'Invalid method'
        ]);
        die;
}
