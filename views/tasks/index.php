<div class="panel-heading">
    <!--                        <div class="panel-tools">-->
    <!--                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>-->
    <!--                            <a class="closebox"><i class="fa fa-times"></i></a>-->
    <!--                        </div>-->
    Tasks table
</div>
<div class="panel-body">
    <table id="example2" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Created at</th>
            <th>End Date</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!$tasks): ?>
            <p>No results matching your query!</p>
        <?php else: ?>
            <?php foreach ($tasks as $key => $value): ?>
                <tr>
                    <td><?php echo $value->title; ?></td>
                    <td><?php echo $value->created_at; ?></td>

                    <td><?php echo $value->end_date; ?></td>
                    <td><?php echo $value->username; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td>
                        <div class=" m-b">
                            <div id="thumbnail">
                                <div class="image-holder">
                                    <img class="img"  src="<?php echo $value->picture; ?>" />
                                    <div style="background: url({{ asset('storage/'.$data->picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if (($value->status == false )): ?>
                            <?php echo 'Pending' ?>
                        <?php else: ?>
                            <?php echo 'Done' ?>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>

</div>