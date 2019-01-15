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



<h1>Minox beard spot</h1>

<h2>Latest questions</h2>
<ul>
    <?php foreach ($questions as $question) : ?>
    <li>
        <p> <a href="questions/<?= $question->question_id ?>"><?= $question->question ?></a>
        by <a href="user/<?= $question->user_id ?>"><?= $question->acronym ?></a>
        <time><?= $question->created ?> </time> </p>
    </li>
    <?php endforeach; ?>
</ul>

<h2>Most popular tags</h2>
<ul>
    <?php foreach ($tags as $tag) : ?>
    <li>
        <p> <a href="tag/<?= $tag->id ?>"><?= $tag->tag ?></a></p>
        <p><?= $tag->description ?></p>
    </li>
    <?php endforeach; ?>
</ul>

<h2>Most active users</h2>
<ul>
    <?php foreach ($users as $user) : ?>
    <li>
        <img src="<?= $user->gravatar ?>" width="50px" alt="gravatar">
        <p> <a href="user/<?= $user->id ?>"><?= $user->acronym ?></a>
    </li>
    <?php endforeach; ?>
</ul>

</article>
