<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>
    <h1>Добавить товар</h1>
    <form action="process-add-product.php" method="post" enctype="multipart/form-data">
    <label for="name">Название:</label>
    <input type="text" name="name" required>
    
    <label for="description">Описание:</label>
    <textarea name="description" required></textarea>
    
    <label for="price">Цена:</label>
    <input type="number" name="price" required>
    
    <label for="type">Тип:</label>
    <input type="text" name="type" required> <!-- Убедитесь, что это поле есть -->
    
    <label for="manufacturer">Производитель:</label>
    <input type="text" name="manufacturer" required>
    
    <label for="img">Изображение:</label>
    <input type="file" name="img" required>
    
    <button type="submit">Добавить товар</button>
</form>


</body>
</html>
