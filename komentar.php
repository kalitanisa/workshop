<?php
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //INSERT INTO DATABASE
        $showAlert = false;
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (NULL, '$comment', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert == 'true') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your comment has been added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    ?>



// Form Komentar
<div class="container my-5">
        <h3>Post a Comment</h3>
        <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
            <label for="desc">Type your comment</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="comment" id="comment" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Post Comment</button>
        </form>
    </div>



//Menampilkan Komentar ke Layar
    <div class="container my-3" id="ques">
        <h1>Diskusi</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM comments WHERE thread_id= $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];

            echo '<div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="img/logoAS.jpg" width="34" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <p class="fw-bold my-0">ikan at ' . $comment_time . '</p>
                <p>' . $content . '</p>
            </div>
        </div>';
        }



//Jika belum ada komentar tampilkan pesan NO RESULT FOUND
        if ($noResult == "true") {
            echo '<div class="container bg-light my-3 py-4">
            <h1 class="display-5">No Result Found</h1>
            <p> Be the first person to ask questions</p>
        </div>';
        }


        ?>