<?php
    if(isUserLoggedIn()){
        header("Location: /");
        exit;
    }
     
    // load database
  $database = connectToDB();
    // load all the questions
    $sql = "SELECT * FROM questions";
    $query = $database->prepare($sql);
    $query->execute();
    $questions = $query->fetchAll();
    // load all the results
    $sql = "SELECT * FROM 
    results *,
    user_name
    user_email
    FROM results
    JOIN users
    on results.user_id = user.id";
    $query = $database->prepare($sql);
    $query->execute();
    $results = $query->fetchAll();
    require 'parts/header.php';
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Results</h1>
    </div>
    <div class="card mb-2 p-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                </tr>
            </thead>
            <tbody>
            <?php if ( isset( $results ) ) : ?>
                <?php foreach( $results as $result ) : ?>
                    <tr>
                        <td><?php echo $result['user_name']; ?></td>
                        <td><?php echo $result['user_email']; ?></td>
                        <td>
                            <?php
                            // $sql = "SELECT * FROM questions WHERE id = :id";
                            // $query = $database->prepare($sql);
                            // $query->execute([
                            //     'id' => $result['question_id']
                            // ]);
                            // $questions = $query->fetch();
                            // echo $question['question'];
                                // use the question_id in $result to find the exact question in the questions table and echo it here
                            foreach ($questions as $question) {
                                if ($question['id'] == $result['question_id']  ) {
                                    echo $question['question'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <!-- echo the answer here -->
                            <?php
                                echo $result['answer'];
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="/" class="btn btn-link link-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back to Home</a>
    </div>
</div>
<?php
    require 'parts/footer.php';