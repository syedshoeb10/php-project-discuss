<?php
session_start();
include '../common/database.php';

if (isset($_POST['signup'])) {

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $address  = $_POST['address'];

    /* 1️⃣ Check if email already exists */
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Email already exists";
        exit;
    }

    /* 2️⃣ Hash password */
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /* 3️⃣ Insert user */
    $stmt = $conn->prepare(
        "INSERT INTO users (name, email, password, address) VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssss", $name, $email, $hashedPassword, $address);

    if ($stmt->execute()) {

        // ✅ Get inserted user ID
        $user_id = $conn->insert_id;

        // ✅ Store user info in session
        $_SESSION['user'] = [
            'id'    => $user_id,
            'name'  => $name,
            'email' => $email
        ];

        header("Location: /discuss/");
        exit;
    } else {
        echo "Something went wrong";
    }
} elseif (isset($_POST['login'])) {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = [
                'id'    => $row['id'],
                'name'  => $row['name'],
                'email' => $row['email']
            ];
            header("Location: /discuss/");
            exit;
        }
    }

    echo "Invalid email or password";
} elseif (isset($_POST['ask'])) {

    $title        = $_POST['title'];
    $description  = $_POST['description'];
    $category_id  = $_POST['category_id'];
    $user_id      = $_SESSION['user']['id'];

    if (!$user_id) {
        die('User not logged in');
    }

    $stmt = $conn->prepare(
        "INSERT INTO questions (title, description, category_id, user_id)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /discuss/");
        exit;
    } else {
        echo $stmt->error;
    }
} else if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO answers (answer, question_id, user_id)
        VALUES ('$answer', '$question_id', '$user_id')";
    $check2 = mysqli_query($conn, $sql);
    if ($check2) {
        echo "<script>
                alert('Answer submitted successfully!');
                window.location.href = '/discuss/';
              </script>";
    }
    echo "not submitted";

    print_r($_POST);
} elseif (isset($_GET['delete'])) {


    if (!isset($_SESSION['user'])) {
        die('Unauthorized access');
    }

    $qid = (int) $_GET['delete'];
    $uid = $_SESSION['user']['id'];

    $stmt = $conn->prepare(
        "DELETE FROM questions WHERE id = ? AND user_id = ?"
    );
    $stmt->bind_param("ii", $qid, $uid);

    if ($stmt->execute()) {
        header('Location: /discuss/');
        exit;
    } else {
        echo "Question not deleted";
    }
}
