<div>
    <?php
    //sample data
    $entries =  [
        ["Kenza Team", "Regular visit to kana forest", "2018-02-01", "Barn-kenya"],
        ["Tsaro team building", "Team building activities", "2018-02-01", "Black-wings"],
        ["Masa team building", "Game reserve for team building", "2018-02-01", "Barn-kenya"]
    ]
    ?>
    <table id="view_doctors_table" class="display text-sm">
        <thead>
            <tr>
                <th>Program name</th>
                <th>Description</th>
                <th>Start date</th>
                <th>Coordinator</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry) : ?>
                <tr>
                    <td><?= $entry[0]; ?></td>
                    <td><?= $entry[1]; ?></td>
                    <td><?= $entry[2]; ?></td>
                    <td><?= $entry[3]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
