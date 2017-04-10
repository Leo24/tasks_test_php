<div class="panel-body">
    <p>
        Create new task
    </p>

    <form role="form" id="form" action="?controller=tasks&action=create" method="POST" enctype="multipart/form-data">

        <div class="form-group"><label>Task title</label> <input type="text" name="title" placeholder="Enter task title" class="form-control" required></div>
        <div class="form-group"><label>Task description</label> <textarea type="text" name="description" placeholder="Enter task description" class="form-control" required></textarea></div>
        <div class="form-group"><label>Username</label> <input type="text" name="username" placeholder="Enter username" class="form-control" required></div>
        <div class="form-group"><label>Email</label> <input type="email" name="email" placeholder="Enter email" class="form-control" required></div>
        <div class="form-group"><label>End Date</label> <input id="datepicker" name="end_date" type="text" class="form-control" required></div>
        <div class="form-group"><label>Picture</label> <input name="picture" type="file" id="filesToUpload"  class="form-control" /></div>
<!--        <output id="filesInfo"></output>-->


        <div>
            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
        </div>
    </form>

</div>


