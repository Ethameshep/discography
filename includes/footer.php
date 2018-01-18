<footer class="text-center">

    <p>&copy; <?php
    $startYear = 1994;
    $thisYear = date('Y');
    if ($startYear == $thisYear) {
        echo $startYear;
    } else {
        echo "{$startYear}-{$thisYear}";
    }?>
    Foo Fighters | Built under the MIT License | Images not included in license | <a href="sources.php" title="Sources used to make this site possible">Sources</a>
</footer>
