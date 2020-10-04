<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Add New Article</h1>
        <p>
            <a href="<?php echo site_url('article/index')?>">< Back to List Article</a>
        </p>
        <table>
            <tr>
                <td><label for="title">Title</label></td>
                <td>:</td>
                <td><input type="text" name="title" id="title" style="width: 497px;"></td>
            </tr>
            <tr>
                <td><label for="url">URL</label></td>
                <td>:</td>
                <td><input type="text" name="url" id="url" style="width: 497px;"></td>
            </tr>
            <tr>
                <td><label for="cover">Cover</label></td>
                <td>:</td>
                <td><input type="text" name="cover" id="cover" style="width: 497px;"></td>
            </tr>
            <tr>
                <td style="vertical-align: top;"><label for="content">Content</label></td>
                <td style="vertical-align: top;">:</td>
                <td><textarea name="content" id="content" cols="60" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit">Save</button></td>
            </tr>
        </table>
    </form>
</body>
</html>