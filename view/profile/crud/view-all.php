<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

?><h1>View all items</h1>


<?php if (!$items) : ?>
    <p>There are no items to show.</p>
    <?php
        return;
endif;
?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Acronym</th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>
        <td>
            <a href="<?= url("profile/update/{$item->id}"); ?>"><?= $item->id ?></a>
        </td>
        <td><?= $item->acronym ?></td>
    </tr>
    <?php endforeach; ?>
</table>
