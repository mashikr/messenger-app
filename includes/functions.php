<?php 

function searchChat($c_id = null, $a_id = null) {

    global $db;
    $user_id = $_SESSION['user_id'];

    $db->query('SELECT id, sender, receiver FROM messages WHERE sender = :user_id OR receiver = :user_id ORDER BY id DESC');
    $db->bind(':user_id', $user_id);
    $users_arr = $db->resultset();

    $ids = array();

    foreach ($users_arr as $user) {
        if ($user['sender'] == $user_id){
            if (!in_array($user['receiver'], $ids)) {
                array_push($ids, $user['receiver']);
            }
        } else {
            if (!in_array($user['sender'], $ids)) {
                array_push($ids, $user['sender']);
            }
        }
    }

    if (empty(getUserById($c_id))) {
        $c_id = null;
    }
    else if (empty($ids) &&  $c_id) {
        printChatUser($c_id, $a_id);
    } elseif (!in_array($c_id, $ids) && $c_id) {
        printChatUser($c_id, $a_id);
    }

    foreach ($ids as $id) {
        printChatUser($id, $a_id);
    }
}

    function printChatUser($id, $a_id = null) {
        $user = getUserById($id);
        $user_id = $_SESSION['user_id'];

        $count = unSeenMsg($user_id, $id);

        $count = $count == 0 ? $count = '' : $count;

        $user['image'] = $user['image'] ? $user['image'] : 'user.png';
        
        $status = '';
        if (isset($_GET['id'])) {
            if ($_GET['id'] == $user['id']) {
                $status = ' active';
            }
        }

        if ($a_id && $a_id == $user['id']) {
            $status = ' active';
        }

        echo '
        <a href="profile?id=' . $user['id'] . '" class="d-flex align-items-center btn btn-info rounded p-1 mt-2 ml-4' . $status . '">
            <div class="chat-img-overlay mr-2"><img class="search-img" src="asset/img/' . $user['image'] .'" alt="' . $user['name'] .'"></div>
            <span class="search-name">' . $user['name'] .'</span>
            <span class="badge badge-danger ml-auto">' . $count .'</span>
        </a>
        ';
    }

    function unSeenMsg($user_id, $id) {
        global $db;
        $db->query("SELECT COUNT(`id`) as count FROM `messages` WHERE `sender` = $id AND `receiver` = $user_id AND `seen` = 0");
       $count = $db->result();
       return $count['count'];

    }

    function getUserById($id) {
        global $db;
        $db->query('SELECT id,name,image FROM `users` WHERE `id` = :id');
        $db->bind(':id', $id);

        return $db->result();
    }

    function  calculateTime($time) {
        date_default_timezone_set("Asia/Dhaka");
        $time = time() - strtotime($time);

        if ($time/60 <= 1) {
            return '1 min ago';
        }else if ($time/3600 < 1) {
            return floor($time/60) . ' min ago';
        } else if (floor($time/3600) == 1) {
            return '1 hour ago';
        } else if ($time/86400 < 1) {
            return floor($time/3600) . ' hour ago';
        } else if (floor($time/86400) == 1) {
            return '1 day ago';
        } else if($time/2592000 < 1){
            return floor($time/86400) . ' day ago';
        } else if (floor($time/2592000) == 1) {
            return '1 month ago';
        } else {
            return floor($time/2592000) . ' month ago';
        }
    }

    function seenAllMsg($id) {
        global $db;

        $user_id = $_SESSION['user_id'];

        $db->query('UPDATE `messages` SET `seen`= 1 WHERE `sender` = :id AND `receiver` = :user_id');
        $db->bind(':id', $id);
        $db->bind(':user_id', $user_id);
        $db->execute();
    }

    function fetchMessages($id) {

        global $db;

        $user_id = $_SESSION['user_id'];

        $db->query('SELECT * FROM `messages` WHERE `sender` = :user_id AND `receiver` = :id OR `sender` = :id AND `receiver` = :user_id');
        $db->bind(':id', $id);
        $db->bind(':user_id', $user_id);
        $messages = $db->resultset();

        if (empty($messages)) {
            echo '<div class="d-flex justify-content-center"><span class="lead">Start conversation </span></div>';
            return;
        }

        seenAllMsg($id);

        foreach ($messages as $message) {

            $message['time'] = calculateTime($message['time']);

            if ($message['sender'] == $user_id) {

                if ($message['type'] == 'image') {
                    echo '
                    <div class="d-flex justify-content-end p-2">
                               <div class="d-flex flex-column msg-image">
                                        <small class="text-muted">'. $message['time'] .'</small>
                                        <div class="rounded p-2">
                                        <img src="asset/img/'. $message['message'] .'" class="msg-image pointer chat-img" alt="'. $message['message'] .'">
                                        </div>
                               </div>
                        </div>
                    ';
                } else {
                    echo '
                        <div class="d-flex justify-content-end p-2">
                                <div class="d-flex flex-column align-items-end">
                                        <small class="text-muted">'. $message['time'] .'</small>';
                                        
                    if ($message['type'] == 'text') {
                        echo
                        '<div class="bg-light rounded p-2">
                        '. $message['message'] .'
                        </div>';
                    
                    } else if ($message['type'] == 'pdf') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <i class="far fa-file-pdf customlabel mr-2 text-warning"></i><a href="asset/pdf/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div>
                        ';
                    } else if ($message['type'] == 'doc') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <i class="far fa-file-word customlabel mr-2 text-primary"></i><a href="asset/doc/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div>
                        ';
                    } else if ($message['type'] == 'excel') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <i class="far fa-file-excel customlabel mr-2 text-success"></i><a href="asset/excel/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div>
                        ';
                    } else if ($message['type'] == 'ppt') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <i class="far fa-file-powerpoint customlabel mr-2 text-danger"></i><a href="asset/ppt/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div>
                        ';
                    } else if ($message['type'] == 'txt') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <i class="far fa-file-alt customlabel mr-2 text-secondary"></i><a href="asset/txt/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div>
                        ';
                    } else if ($message['type'] == 'audio') {
                        echo '
                        <div class="rounded p-2 bg-dark">
                                <audio class="audio" controls>
                                        <source src="asset/audio/' . $message['message'] . '" 
                                        type="audio/mp3">
                                </audio>
                        </div>
                        ';
                    } else if ($message['type'] == 'video') {
                        echo '
                        <div class="rounded mt-2">
                                <video class="video float-right" controls>
                                        <source src="asset/video/' . $message['message'] . '"
                                                type="video/mp4">
                                </video>
                        </div>
                        ';
                    } else if ($message['type'] == 'emoji') {
                        echo '
                        <div class="rounded mt-2">
                        <img src="' . $message['message'] . '" alt="emoji" class="msg-emoji">
                        </div>
                        ';
                    }

                    echo '
                            </div>
                        </div>
                    ';
                }


            } else {
                $user = getUserById($id);

                $user['image'] = $user['image'] ? $user['image'] : 'user.png';

                if ($message['type'] == 'image') {
                    echo '
                    <div class="d-flex justify-content-start p-2">
                                <div class="search-img-overlay p-2 mt-2 mr-2">
                                <img class="search-img" src="asset/img/'. $user['image'] .'" alt="'. $user['name'] .'">
                                </div>
                               <div class="d-flex flex-column col-lg-8">
                                        <div class="d-flex justify-content-between col-lg-6 text-muted">
                                                <small>'. $user['name'] .'</small> <small>'. $message['time'] .'</small>
                                        </div>
                                        <div class="rounded p-2">
                                        <img src="asset/img/' . $message['message']  .'" class="msg-image pointer chat-img" alt="' . $message['message'] . '">
                                        </div>
                               </div>
                        </div>
                    ';

                } else {
                    echo '
                    <div class="d-flex justify-content-start p-2">
                            <div class="search-img-overlay p-2 mt-2 mr-2">
                                    <img class="search-img" src="asset/img/'. $user['image'] .'" alt="'. $user['name'] .'">
                            </div>
                            <div class="d-flex flex-column">
                                    <div class="d-flex justify-content-between text-muted">
                                            <small>'. $user['name'] .'</small> <small>'. $message['time'] .'</small>
                                    </div>';

                    if ($message['type'] == 'text') {
                    echo
                        '<div class="bg-info text-white rounded p-2">
                        '. $message['message'] .'
                        </div>';
                    
                    } else if ($message['type'] == 'pdf') {
                        echo '
                            <div class="rounded bg-light p-2">
                            <a href="asset/pdf/' . $message['message'] . '">' . $message['message'] . '</a> <i class="far fa-file-pdf customlabel ml-2 text-warning"></i>
                            </div>
                        ';
                    } else if ($message['type'] == 'doc') {
                        echo '
                            <div class="rounded bg-light p-2">
                            <a href="asset/doc/' . $message['message'] . '">' . $message['message'] . '</a> <i class="far fa-file-word customlabel ml-2 text-primary"></i>
                            </div>
                        ';
                    } else if ($message['type'] == 'excel') {
                        echo '
                            <div class="rounded bg-light p-2">
                            <a href="asset/excel/' . $message['message'] . '">' . $message['message'] . '</a> <i class="far fa-file-excel customlabel ml-2 text-success"></i>
                            </div>
                        ';
                    } else if ($message['type'] == 'ppt') {
                        echo '
                            <div class="rounded bg-light p-2">
                            <a href="asset/ppt/' . $message['message'] . '">' . $message['message'] . '</a> <i class="far fa-file-powerpoint customlabel ml-2 text-danger"></i>
                            </div>
                        ';
                    } else if ($message['type'] == 'txt') {
                        echo '
                        <div class="rounded bg-light p-2">
                        <a href="asset/txt/' . $message['message'] . '">' . $message['message'] . '</a>
                        </div><i class="far fa-file-alt customlabel ml-2 text-secondary"></i>
                        ';
                    } else if ($message['type'] == 'audio') {
                        echo '
                        <div class="rounded p-2 bg-dark">
                                <audio class="audio" controls>
                                        <source src="asset/audio/' . $message['message'] . '" 
                                        type="audio/mp3">
                                </audio>
                        </div>
                        ';
                    } else if ($message['type'] == 'video') {
                        echo '
                        <div class="rounded mt-2">
                                <video class="video" controls>
                                        <source src="asset/video/' . $message['message'] . '"
                                                type="video/mp4">
                                </video>
                        </div>
                        ';
                    } else if ($message['type'] == 'emoji') {
                        echo '
                        <div class="rounded mt-2">
                        <img src="' . $message['message'] . '" alt="emoji" class="msg-emoji">
                        </div>
                        ';
                    }

                    echo '
                        </div>
                    </div>
                    ';
                }
               
            }
        }
    }
