<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "article";
if (isset($class)) {
    $classes[] = $class;
}


?><article <?= classList($classes) ?>>

<!-- MAIN QUERY -->
<?php foreach ($questions as $question) : ?>
    <?php if ($question->question_id == $id  ) : ?>
        <h1><?= $question->question ?></h1>
        <h4><?= $question->description ?></h4>

        <p><small>Asked by
            <a href="../user/<?= $question->user_id ?>">/<?= $question->acronym ?></a>
            <span><?= $question->created ?></span>
            <img width="50px" src="<?= $question->gravatar?>" alt="Gravatar"></small>
        </p>
        <hr>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>


<!-- MAIN QUERY COMMENTS -->
<?php foreach ($Qcomments as $comment) : ?>
    <?php if ($comment->question_id == $id  ) : ?>
        <small><?= $comment->comment ?> // <a href="../user/<?= $comment->id ?>"><?= $comment->acronym ?></a>
        - <?= $comment->created ?></small>
    <?php endif; ?>
<?php endforeach; ?>
<br><br>
<?= $qform ?>



<h2>Answers</h2>
<!-- MAIN ANSWER -->
<?php foreach ($answers as $answer) : ?>
    <?php if ($answer->question_id == $id  ) : ?>
        <div class="author-byline">


            <h4><?= $answer->answer ?></h4>

            <small>Answered by
                <a href="../user/<?= $answer->user_id ?>"><?= $answer->acronym ?></a>
                <span><?= $answer->created ?></span>
                <img width="50px" src="<?= $answer->gravatar?>" alt="Gravatar">
        </small>


        <hr>
        <!--<p><b>Comments:</b></p>-->
        <!-- MAIN Answer COMMENTS -->
        <?php foreach ($Acomments as $comment) : ?>

            <?php if ($comment->question_id == $id && $comment->answer_id == $answer->id) : ?>
                <p><small><?= $comment->comment ?> // <a href="../user/<?= $comment->id ?>"><?= $comment->acronym ?></a>
                - <?= $comment->created ?></small></p>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>

    <?php endif; ?>
<?php endforeach; ?>

<?php foreach ($answers as $answer) : ?>
    <?php if ($answer->question_id == $id) : ?>
        <h2>Leave a comment</h2>
        <?= $cform ?>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>


<h2>Leave an answer</h2>
<?= $aform ?>

</article>
