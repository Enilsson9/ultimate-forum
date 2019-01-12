<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

?><h1>My profile</h1>

<pre>
<?php

//var_dump($item);
//var_dump($session);

?>

</pre>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Gravatar</th>
        <th>Full name</th>
        <th>Acronym</th>
        <th>Email</th>
    </tr>
    <tr>
        <td><?= $item->id ?></td>
        <td><img src="<?= $item->gravatar ?>" alt="Gravatar"></td>
        <td><?= $item->fullname ?></td>
        <td><?= $item->acronym ?></td>
        <td><?= $item->email ?></td>
    </tr>
</table>

<p>Click <a href="profile/update">here</a> to update</p>
