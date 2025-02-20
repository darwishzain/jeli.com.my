<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($username) && !empty($password)) {
            // Use a prepared statement for security
            $login_q = mysqli_prepare($conn, "SELECT id, username, password, role FROM user WHERE username = ? LIMIT 1");
            mysqli_stmt_bind_param($login_q, 's', $username);
            mysqli_stmt_execute($login_q);
            $result = mysqli_stmt_get_result($login_q);
        
            if ($login_r = mysqli_fetch_assoc($result)) { // User found
                if (password_verify($password, $login_r['password'])) { // Verify password
                    $_SESSION['id'] = $login_r['id'];
                    $_SESSION['username'] = $login_r['username'];
                    $_SESSION['role'] = $login_r['role'];

                    echo("<script>console.log('Log Masuk Berjaya. Selamat Datang $username'); window.location.href='admin.php';</script>");
                    header("Location: ../pages/user.php");
                    exit;
                } else {
                    echo "<script>alert('Log Masuk Gagal. Kata laluan salah!');</script>";
                }
            } else {
                echo "<script>alert('Log Masuk Gagal. Username tidak wujud!');</script>";
            }

            mysqli_stmt_close($login_q);
        } else {
            echo "<script>alert('Sila isi semua maklumat!');</script>";
        }
    }
    else if(isset($_POST['register']))
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $created = date("Y-m-d"); // Use current timestamp
        $hpassword = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($email) && !empty($username) && !empty($password)) {
            do {
                $userid = bin2hex(random_bytes(8));
                $query = "INSERT INTO user (id, username, email, password, created) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, 'sssss', $userid, $username, $email, $hpassword, $created);
                $success = mysqli_stmt_execute($stmt);
            } while (!$success); // Retry if collision occurs

            mysqli_stmt_close($stmt);

            echo "<script>alert('Pendaftaran Berjaya. Sila Log Masuk'); window.location.href='admin.php?page=profile&login';</script>";
        } else {
            echo "<script>alert('Sila isi semua maklumat!');</script>";
        }

    }
}

if(isset($_GET['logout']))
{
    //session_start(); // Start session
    session_unset();
    session_destroy();

    header("Location: ../pages/location.php");
    exit;
}
function accountform($form)
{
    $content = '';
    $text = [];
    if($form == 'login')
    {
        $text = ['Log Masuk','Daftar','register'];
    }
    else if($form=='register')
    {
        $text = ['Daftar','Log Masuk','login'];
    }
    $content .= '<form action="../pages/user.php" class="bg-light border border-1 py-3" method="post">';
    $content .= '<div class="d-flex">';
    $content .= '<input type="text" name="username" class="form-control" placeholder="Nama pengguna" required>';
    $content .= '<input type="text" name="password" class="form-control" placeholder="Kata laluan" required>';
    if($form == 'register')
    {
        $content .= '<input type="text" name="email" class="form-control" placeholder="E-mel" required>';
    }
    $content .= '<input type="submit" class="form-control btn btn-success" name="'.$form.'" value="'.$text[0].'">';
    $content .= '<a href="../pages/user.php?'.$text[2].'" class="form-control btn btn-outline-primary">'.$text[1].'</a>';
    $content .= '</div>';
    $content .= '</form>';
    return($content);
}