<?php
include_once("classes/DB.php");
$db = Db::getInstance();
header('Content-type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents('php://input'), 'true');
$q = $_GET['q'];
$params = explode('/', $q);
$path = $params[0]??null;
$action = $params[1]??null;
$id = $params[2]??null;
validateRest($method,$data,$path,$action,$id);
switch ($path) {
    case 'login':
        login($data);
        break;
    case 'user':
        if ($action === 'register') {
            register_user($data);
        } elseif ($action === 'get') {
            get_user($id);
        }
        break;
}

function validateRest($method,$data,$path,$action,$id) {
    if (!in_array($path,['user','login'])) {
        error('Неверный путь');
    } elseif (!in_array($path.'/'.$action, ['login','user/get','user/register'])) {
        error('Неверное действие');
    } elseif ($path.'/'.$action === 'user/get') {
        if ($method !== 'GET') {
            error('Неверный метод');
        } elseif (!$id) {
            error('Пустой id');
        }
    } else {
        if ($method !== 'POST') {
            error('Неверный метод');
        } elseif (!$data) {
            error('Пустые данные');
        }
    }
}

function error($message,$code=400) {
    http_response_code($code);
    echo json_encode(['status'=>false,'description'=>$message]);
    die();
}

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function login($data) {
    global $db;
    $id = $data['id']??'';
    $password = $data['password']??'';
    if (!empty($id) && !empty($password)) {
        $res = $db->getConnection()->prepare("SELECT * FROM User WHERE id = ?");
        $res->execute([$id]);
        if ($user = $res->fetch()) {
            if (password_verify($password,$user['password'])) {
                $token = bin2hex(openssl_random_pseudo_bytes(16));
                $db->query("UPDATE User set token ='$token' where id=`$id`");
                echo json_encode((object) (['token'=>$token]));
            }
        } else {
            error('Пользователь не найден',404);
        }
    } else {
        error('Пустые данные');
    }
}
function register_user($data) {
    global $db;
    $first_name = $data['first_name']??'';
    $second_name = $data['second_name']??'';
    $age = $data['age']??null;
    if ($age && !is_numeric($age)) {
        error('Некорректные данные');
    }
    $birthdate = $data['birthdate']??null;
    if ($birthdate) {
        $birthdate = strtotime($birthdate);
        if (!$birthdate) {
            error('Некорректные данные');
        } else {
            $birthdate = date('Y-m-d',$birthdate);
        }
    }
    $biography = $data['biography']??'';
    $city = $data['city']??'';
    $password = $data['password']??'';
    $id = GUID();
    if (empty($password)) {
        error('Пустые данные');
    } else $password = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO `User` 
    (`id`, `first_name`, `second_name`, `age`, 
    `birthdate`, `biography`, `city`, `password`) VALUES (?,?,?,?,?,?,?,?)";
    $res = $db->getConnection()->prepare($query);
    $res->execute([$id,$first_name,$second_name,$age,$birthdate,$biography,$city,$password]);
    echo json_encode((object) (['user_id'=>$id]));
}
function get_user($id) {
    global $db;
    $res = $db->getConnection()->prepare("SELECT * FROM User WHERE `id`=?");
    $res->execute([$id]);
    $data = $res->fetch();
    if ($data) {
        unset($data['password']);
        unset($data['token']);
        echo json_encode((object)(['schema' => $data]));
    }
    else error('Пользователь не найден',404);
}

