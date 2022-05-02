<html lang="en">
<head>
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="/app.css"/>

</head>
<body>

<?php foreach($posts as $post) : ?>

<article>
<?= $post ?>
</article>

<?php endforeach; ?>

<script type="text/javascript" src="/app.js"></script>
</body>
</html>
