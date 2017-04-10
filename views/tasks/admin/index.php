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
            <th>Action</th>
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
                        <?php if (($value->status == false )): ?>
                            <?php echo 'Pending' ?>
                        <?php else: ?>
                            <?php echo 'Done' ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="col-md-2 m-b">
                            <a href="?controller=tasks&action=edit&task_id=<?php echo $value->id; ?>" class="btn w-xs btn-success">
                                <span class="bold">Edit task</span>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>

</div>