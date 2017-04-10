<div class="panel-body">
    <p>
        Create new task
    </p>

    <form role="form" id="taskForm" action="?controller=tasks&action=create" method="POST" enctype="multipart/form-data">

        <div class="form-group"><label>Task title</label> <input type="text" name="title" placeholder="Enter task title" class="form-control" required></div>
        <div class="form-group"><label>Task description</label> <textarea name="description" placeholder="Enter task description" class="form-control" required></textarea></div>
        <div class="form-group"><label>Username</label> <input type="text" name="username" placeholder="Enter username" class="form-control" required></div>
        <div class="form-group"><label>Email</label> <input type="email" name="email" placeholder="Enter email" class="form-control" required></div>
        <div class="form-group"><label>End Date</label> <input id="datepicker" name="end_date" type="text" class="form-control" required></div>
        <div class="form-group">
            <label>Picture</label>
            <input name="picture" type="file" id="fileToUpload"  class="form-control">
            <img id="preview" src="#" alt="" style="display: none;"/>
        </div>

        <div>
            <button type="button" id="showPreview" class="btn btn-sm btn-primary m-t-n-xs" data-toggle="modal" data-target="#myModal">Preview</button>
            <button class="btn btn-sm btn-info m-t-n-xs" type="submit"><strong>Save</strong></button>
        </div>
    </form>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Task preview</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Task title:</label>
                        <p class="task-title" ></p>
                    </div>
                    <div class="form-group">
                        <label>Task description</label>
                        <textarea name="description" placeholder="Enter task description" class="task-description form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Username:</label>
                        <p class="task-username"></p>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <p class="task-email"></p>
                    </div>
                    <div class="form-group">
                        <label>End date:</label>
                        <p class="task-end-date"></p>
                    </div>
                    <div class="form-group">
                        <label>Picture:</label>
                        <img id="modalPreview" src="#" alt="" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="popupSaveTask" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    window.onload = function () {
        $('#showPreview').on('click', function () {
            var title = $('#taskForm input[name=title]').val();
            var description = $('#taskForm textarea').val();
            var username = $('#taskForm input[name=username]').val();
            var email = $('#taskForm input[name=email]').val();
            var endDate = $('#taskForm input[name=end_date]').val();

            $('#myModal .modal-body .task-title').append(title);
            $('#myModal .modal-body .task-description').append(description);
            $('#myModal .modal-body .task-username').append(username);
            $('#myModal .modal-body .task-email').append(email);
            $('#myModal .modal-body .task-end-date').append(endDate);
        });

        $("#fileToUpload").change(function (e) {
            var file = this.files[0];
            var fileType = file["type"];
            var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, ValidImageTypes) < 0) {
                alert('Unsupported type of file');
            } else {
                var fileReader = new FileReader();
                fileReader.onload = function (e) {
                    var img = new Image();
                    img.onload = function () {
                        var MAX_WIDTH = 320;
                        var MAX_HEIGHT = 240;
                        var width = img.width;
                        var height = img.height;

                        if (width > height) {
                            if (width > MAX_WIDTH) {
                                height *= MAX_WIDTH / width;
                                width = MAX_WIDTH;
                            }
                        } else {
                            if (height > MAX_HEIGHT) {
                                width *= MAX_HEIGHT / height;
                                height = MAX_HEIGHT;
                            }
                        }

                        var canvas = document.createElement("canvas");
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext("2d").drawImage(this, 0, 0, width, height);
                        this.src = canvas.toDataURL();
                    };
                    img.src = e.target.result;
                };

                readURL(this);
                fileReader.readAsDataURL(e.target.files[0]);
            }
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').css('display', 'block');
                    $('#modalPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    }

</script>
