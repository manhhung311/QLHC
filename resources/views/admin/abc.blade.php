<html>
    <body>
        <form method="post" action="http://localhost:8080/laravel/public/admin/1_chemical_fertilizers">
            @csrf
            <input type="text" name="cat[]">
    <label for="cat_1">Thể thao</label><br/><br/>
    <input type="text" name="cat[]">
    <label for="cat_2">Xã hội</label><br/><br/>
    <input type="text" name="cat[]">
    <label for="text">Pháp luật</label><br/><br/>
    <input type="text" name="cat[]">
    <label for="cat_3">đời sống</label><br/><br/>
    <input type="submit" name="add_post" value="Gửi thông tin">
        </form>
    </body>
</html>