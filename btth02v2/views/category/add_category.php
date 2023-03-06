<!DOCTYPE html>
<html>
<head>
    <title>Quản lý thể loại bài hát</title>
</head>
<body>
    <h1>Quản lý thể loại bài hát</h1>
    <form method="post" action="addCategory">
        <label for="name">Tên thể loại:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Thêm thể loại</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th
                <th>Tên thể loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $category->getId(); ?></td>
                <td><?= $category->getName(); ?></td>
                <td>
                    <form method="post" action="editCategory">
                        <input type="hidden" name="id" value="<?= $category->getId(); ?>">
                        <input type="text" name="name" value="<?= $category->getName(); ?>">
                        <button type="submit">Sửa</button>
                    </form>
                    <form method="post" action="deleteCategory">
                        <input type="hidden" name="id" value="<?= $category->getId(); ?>">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
