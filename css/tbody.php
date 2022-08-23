<tbody>

    <?php

                    $sql = "SELECT * from personal_details";
                    $result = $conn->query($sql);

                  if ($result->num_rows > 0 ) {
                    while ($row = $result->fetch_assoc()) :
                ?>
    <tr>
        <th scope="row"><?php echo $row["ID"] ?></th>
        <td><?php echo $row["Name"] ?></td>
        <td><?php echo $row["Mobile"] ?></td>
        <td><?php echo $row["EMail"] ?></td>
        <td><a href="updateIndex.php?edit=<?php echo $row['ID']; ?>">Edit</a></td>
        <td><a href="DBconnection\delete.php?del=<?php echo $row['ID']; ?>">Delete</a></td>
    </tr>

    <?php 
                    endwhile;
                  } 
                    else { ?>

    <tr class="table-danger">
        <td><?php echo "No Data Found" ?></td>
    </tr>
    <?php } ?>

</tbody>