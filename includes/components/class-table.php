<?php
$file = '../data/'.$type.'.csv';
$csv = array_map('str_getcsv', file($file));
array_walk($csv, function(&$a) use ($csv) {
    $a = array_combine($csv[0], $a);
    $a["Nice name"] = preg_replace(array("/[^a-zA-Z\s]/", "/\s\s+/", "/(\s+-\s*|\s*-\s+)/"), array("-", " ", " "), strtolower($a["Name"]));
});
array_shift($csv);
?>

<div>
    <div class="row justify-content-center" >
        <?php foreach($csv as $item): ?>
        <div class="col-3 col-md-offset-1">
            <div class="card">
                <img class="card-img-top" src='<?php echo $item["Image"]; ?>' alt='<?php echo $item["Name"]; ?> image'>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $item["Name"]; ?> </h5>
                    <p class="card-text"> <?php echo $item["Description"]; ?> </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<table class="table table-responsive">
    <thead>
        <th scope="col">Class</th>
        <th scope="col">Days</th>
        <th scope="col">Times</th>
        <th scope="col">Ages</th>
        <th scope="col">Class Starts</th>
        <th scope="col">Notes</th>
        <th scope="col">Learn More</th>
    </thead>
    <tbody>
        <?php foreach($csv as $item): ?>
        <tr>
            <td style="width: 20%">
                <?php echo $item["Name"]; ?>
            </td>
            <td>
                <?php echo $item["Days"]; ?>
            </td>
            <td>
                <?php echo $item["Times"]; ?>
            </td>
            <td>
                <?php echo $item["Ages"]; ?>
            </td>
            <td>
                <?php echo $item["Class starts"]; ?>
            </td>
            <td style="width: 40%">
                <?php echo $item["Notes"]; ?>
            </td>
            <td>
                <a href="classes/info?<?php echo http_build_query(array("type"=>$type, "class"=>$item["Nice name"])); ?>">More information</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
