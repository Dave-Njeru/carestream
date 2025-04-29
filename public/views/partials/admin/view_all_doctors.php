<div>
    <?php
    require_once 'C:/xampp/htdocs/projects/carestream/public/connection.php';

    // Fetch data
    try {
        $entries = [];
        $sql = "select id, first_name, last_name, email, contact
        from doctors";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $results = $stmt->get_result();

        while ($row = $results->fetch_assoc()) {
            $entries[] = $row;
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo ('Error: ' . $e->getMessage());
        $entries = [];
    }
    ?>

    <!-- Display data in a table -->
    <table id="view_doctors_table" class="display text-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry) : ?>
                <tr>
                    <td><?= htmlspecialchars($entry['id']); ?></td>
                    <td><?= htmlspecialchars($entry['first_name']); ?></td>
                    <td><?= htmlspecialchars($entry['last_name']); ?></td>
                    <td><?= htmlspecialchars($entry['email']); ?></td>
                    <td><?= htmlspecialchars($entry['contact']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>