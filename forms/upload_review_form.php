<form method="post" action="upload_review.php" enctype="multipart/form-data">
    <input class="search" type="text" name="username" size="40" value="" required placeholder="Username">
    <input class="search" type="text" name="book_title" size="40" value="" required placeholder="Name of Book">
    <input class="search" type="text" name="author" size="40" value="" required placeholder="Author">

    <select class="search" name="genre" required>
        <option value="" disabled selected>Genre</option>
        <option value="Humour">Humour</option>
        <option value="Non Fiction">Non-Fiction</option>
        <option value="Historical Fiction">Historical Fiction</option>
        <option value="Sci Fi">Sci-Fi</option>
    </select>

    <select class="search" name="star_rating" required>
        <option value="" disabled selected>Star Rating (out of 5)</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <textarea class="search" name="review" rows="10" cols="50" required placeholder="Review"></textarea>

    <br><br>

    <input class="submit" type="submit" name="upload_review" value="Upload">
</form>