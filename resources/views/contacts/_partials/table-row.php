<?php declare(strict_types=1); ?>
<?php /** @var array $contact */ ?>
<tr>
    <td><?= $contact['id'] ?></td>
    <td><?= htmlspecialchars($contact['name']) ?></td>
    <td><?= htmlspecialchars($contact['email']) ?></td>
</tr>
