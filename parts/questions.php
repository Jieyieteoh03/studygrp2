<?php

    // load the database
    $database = connectToDB();

    // Get all the questions from the database
    $sql = "SELECT * FROM questions";
    $query = $database->prepare($sql);
    $query->execute();
    $questions = $query->fetchAll();

?>
<form
    method="POST"
    action="/form/submit">

    <!-- Name & Email fields -->
    <div class="mb-4">
        <div class="row">
            <div class="col">
                <label for="name" class="form-label fw-bold">Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    placeholder="Enter your name"
                    >
            </div>
            <div class="col">
                <label for="email" class="form-label fw-bold">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email"
                    >
            </div>
        </div>
    </div>

    <!-- Loop through all the questions -->
    <?php if ( isset( $questions ) ) : ?>
        <?php foreach( $questions as $index => $question ) : ?>
            <div class="mb-5 px-3">
                <label for="role" class="form-label fw-bold"><?= ($index+1); ?>. <?= $question['question']; ?></label>
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="radio" 
                        name="q<?= $question['id']; ?>"  
                        id="answer5_<?= $question['id']; ?>" 
                        value="Very Satisfied"
                        >
                    <label class="form-check-label w-100" for="answer5_<?= $question['id']; ?>">
                        Very Satisfied
                    </label>
                </div>
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="radio" 
                        name="q<?= $question['id']; ?>"  
                        id="answer4_<?= $question['id']; ?>" 
                        value="Satisfied"
                        >
                    <label class="form-check-label w-100" for="answer4_<?= $question['id']; ?>">
                        Satisfied
                    </label>
                </div>
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="radio" 
                        name="q<?= $question['id']; ?>"  
                        id="answer3_<?= $question['id']; ?>" 
                        value="Neutral"
                        >
                    <label class="form-check-label w-100" for="answer3_<?= $question['id']; ?>">
                        Neutral
                    </label>
                </div>
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="radio" 
                        name="q<?= $question['id']; ?>"  
                        id="answer2_<?= $question['id']; ?>" 
                        value="Dissatisfied"
                        >
                    <label class="form-check-label w-100" for="answer2_<?= $question['id']; ?>">
                        Dissatisfied
                    </label>
                </div>
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="radio" 
                        name="q<?= $question['id']; ?>" 
                        id="answer1_<?= $question['id']; ?>" 
                        value="Very Dissatisfied"
                        >
                    <label class="form-check-label w-100" for="answer1_<?= $question['id']; ?>">
                        Very Dissatisfied
                    </label>
                </div>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>