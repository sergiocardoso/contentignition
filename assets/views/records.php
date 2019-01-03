<!--//FETCH RECORDS TABLE -->
            <?php if ($GLOBALS['records'] != "") {
    ?>


        <div class="row justify-content-center col-12">
            <div class="col-10">
                <h5>Foram encontrados <?= $GLOBALS['total']; ?> registros</h5>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col" >
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Client_id">Client ID</a></th>
                        <th scope="col">
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Client">Client</a>
                        </th>
                        <th scope="col">
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Deal_id">Deal ID</a>
                            
                        </th>
                        <th scope="col"><a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Deal">Deal</a></th>
                        <th scope="col">
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Date&type=hour">Hour</a>
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Date&type=day">Day</a>
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Date&type=mouth">Mouth</a>
                        </th>
                        <th scope="col">
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Accept">Accept</a>
                        </th>
                        <th scope="col">
                            <a href="<?= $GLOBALS['conn']['url']; ?>&orderBy=Refused">Refused</a>
                        </th>
                        </tr>
                    </thead>
                <tbody>
    
                <?php foreach ($GLOBALS['records'] as $record) {
        echo "<tr>
                    <th scope='row'>{$record['ID']}</th>
                    <td>{$record['Client_id']}</td>
                    <td>{$record['Client']}</td>
                    <td>{$record['Deal_id']}</td>
                    <td>{$record['Deal']}</td>
                    <td>{$record['Hour']}</td>
                    <td>{$record['Accept']}</td>
                    <td>{$record['Refused']}</td>
                    </tr>";
    } ?>
                
                
                </tbody>
                </table>
            </div>
        </div>



            <?php
} ?>