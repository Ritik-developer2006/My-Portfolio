<?php
// echo phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
header('content-type:application/json;charset=utf-8');
require_once __DIR__ . '/websocketNotify.php';
include_once('../connection/mysqlconnection.php');
include_once('sendEmailApi.php');

// $mthod = (isset($_POST['method']) && $_POST['method'] != '') ? $_POST['method'] : '';

// If POST is empty, try to read JSON and map it to $_POST
if (empty($_POST)) {
    $rawInput = file_get_contents("php://input");
    $jsonData = json_decode($rawInput, true);

    if (is_array($jsonData)) {
        $_POST = $jsonData;
    }
}

// use $_POST everywhere
$method = $_POST['method'] ?? '';

class UserApi
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

    // send email message
    public function send_mail()
    {
        $smslink = $this->connect_to_mysqlsms();
        mysqli_begin_transaction($smslink);

        $full_name = mysqli_real_escape_string($smslink, $_POST['name']);
        $email     = mysqli_real_escape_string($smslink, $_POST['email']);
        $subject   = mysqli_real_escape_string($smslink, $_POST['subject']);
        $message   = mysqli_real_escape_string($smslink, $_POST['message']);

        // Handle file upload
        $file_path = null;
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_name = basename($_FILES['file']['name']);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $unique_name = uniqid() . '.' . $file_ext;
            $file_path = '../uploads/' . $unique_name;

            if (!move_uploaded_file($file_tmp_name, $file_path)) {
                // File upload failed
                $unique_name = null;
            }
        }

        // Insert into DB
        $stmt = $smslink->prepare("INSERT INTO user_message (full_name, email, subject, message, file) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $full_name, $email, $subject, $message, $unique_name);

        if ($stmt->execute()) {
            mysqli_commit($smslink);

            // Call websocket
            sendWebSocket([
                "type" => "new_mail",
                "name" => $full_name,
                "email" => $email
            ]);
        } else {
            mysqli_rollback($smslink);
            echo json_encode(['status' => 0, 'msg' => 'Database insert failed']);
            die;
        }

        // Send Email
        $response = sendEmail($full_name, $email, 'rk5771829@gmail.com', $subject, $message, $file_path, $file_name);
        if ($response['status'] == 1) {
            $arr = ['status' => 1, 'msg' => 'Email sent successfully'];
        } else {
            $arr = ['status' => 0, 'msg' => 'Email failed: ' . $response['msg']];
        }

        echo json_encode($arr);
        die;
    }

    // Send feeddback 
    public function send_feedback()
    {
        $smslink = $this->connect_to_mysqlsms();
        mysqli_begin_transaction($smslink);

        $full_name = mysqli_real_escape_string($smslink, $_POST['name']);
        $email     = mysqli_real_escape_string($smslink, $_POST['email']);
        $subject   = mysqli_real_escape_string($smslink, $_POST['subject']);
        $message   = mysqli_real_escape_string($smslink, $_POST['message']);

        // Handle file upload
        $file_path = null;
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_name = basename($_FILES['file']['name']);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $unique_name = uniqid() . '.' . $file_ext;
            $file_path = '../assets/user_images/' . $unique_name;

            if (!move_uploaded_file($file_tmp_name, $file_path)) {
                // File upload failed
                $unique_name = null;
            }
        }

        // Insert into DB
        $stmt = $smslink->prepare("INSERT INTO tbl_testimonials (full_name, email, subject, description, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $full_name, $email, $subject, $message, $unique_name);

        if ($stmt->execute()) {
            mysqli_commit($smslink);
            $arr = ['status' => 1, 'msg' => 'Email sent successfully'];

            // Call websocket
            sendWebSocket([
                "type" => "new_feedback",
                "name" => $full_name,
                "email" => $email
            ]);
        } else {
            mysqli_rollback($smslink);
            $arr = ['status' => 0, 'msg' => 'Database insert failed'];
        }

        // Send Email
        // $response = sendEmail($email, 'rk5771829@gmail.com', $subject, $message)
        echo json_encode($arr);
        die;
    }
}

$user_obj = new UserApi($conn);
switch ($method) {
    case 'send_mail':
        $data = $user_obj->send_mail();
        echo json_encode($data);
        break;
        
    case 'send_feedback':
        $data = $user_obj->send_feedback();
        echo json_encode($data);
        break;

    default:
        echo json_encode([
            'status' => 0,
            'msg' => 'Invalid method'
        ]);
        die;
}
