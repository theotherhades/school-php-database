<form method="post" action="rating_search.php" enctype="multipart/form-data">
    <p>Rating search: </p>
    <select class="half_width" name="amount">
        <option value="exactly" selected>Exactly</option>
        <option value="at_least">At Least</option>
        <option value="at_most">At Most</option>
    </select>

    <select class="half_width" name="stars">
        <option value=1>★</option>
        <option value=2>★★</option>
        <option value=3>★★★</option>
        <option value=4>★★★★</option>
        <option value=5>★★★★★</option>
    </select>

    <input type="submit" class="submit" name="rating_search" value="Search">
</form>