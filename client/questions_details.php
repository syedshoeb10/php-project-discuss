    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Container spacing */
        .container {
            margin-top: 40px;
        }

        /* Column fix */
        .clo-8 {
            max-width: 800px;
            margin: auto;
        }

        /* Heading */
        .heading {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #212529;
        }

        /* Question title */
        .clo-8 h4 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        /* Question description */
        .clo-8 p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* Textarea styling */
        .forn-control {
            width: 100%;
            min-height: 140px;
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            resize: vertical;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        /* Focus effect */
        .forn-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        /* Button styling */
        .btn-primary {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
        }

        /* Mobile optimization */
        @media (max-width: 576px) {
            .heading {
                font-size: 24px;
            }

            .clo-8 h4 {
                font-size: 20px;
            }
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="clo-8">
                <h1 class="heading">questions</h1>
                <?php include __DIR__ . '/../common/database.php';
                $query = "SELECT * from questions where id = $qid";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $cid = $row['category_id'];
                echo "<h4>" . $row['title'] . "</h4>
            <p>" . $row['description'] . "</p>";

                include './client/answers.php';
                // print_r($row);
                ?>
                <form action="/discuss/server/requests.php" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                    <textarea class="forn-control" placeholder="Enter your answer..." name="answer" id=""></textarea>
                    <button class="btn btn-primary"> write your answer</button>
                </form>
            </div>
            <div class="col-4">
               
                <?php
                $categoryQuery = "SELECT name FROM category where id = $cid";
                $categoryResult = $conn->query($categoryQuery);
                $categoryRow =$categoryResult->fetch_assoc();
                echo " <h1>".ucfirst($categoryRow['name'])."</h1>";
                // echo $cid; 
                $query = "SELECT * FROM questions where category_id = $cid and id!=$qid";
                $result = $conn->query($query);
                foreach ($result as $row) {


                    $id = $row['id'];
                    $title = $row['title'];
                    echo "<div>
            <h4><a href =?q-id=$id>$title</a>;
            </h4>
            </div>";
                }
                ?>
            </div>
        </div>
    </div>