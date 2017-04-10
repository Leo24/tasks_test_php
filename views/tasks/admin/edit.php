<div class="panel-body">
    <p>
        Edit task
    </p>

    <form role="form" id="form" action="?controller=tasks&action=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $task->id; ?>">

        <div class="form-group">
            <label>Task title:</label>
            <p class="" ><?php echo $task->title; ?></p>
        </div>
        <div class="form-group">
            <label>Task description</label>
            <textarea name="description" placeholder="Enter task description" class="form-control" required><?php echo $task->description; ?></textarea>
        </div>
            <label class="col-sm-2 control-label">Status</label>
            <select class="selectpicker form-control m-b" name="status">
                <option value="0" <?php echo ($value->status == false) ? 'selected' : '';?>>Pending</option>
                <option value="1" <?php echo ($value->status == true) ? 'selected' : '';?>>Done</option>
            </select>


        <div>
            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
        </div>
    </form>

</div>


<script>
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('filesToUpload').onchange = function(){
            var files = document.getElementById('filesToUpload').files;
            for(var i = 0; i < files.length; i++) {
                resizeAndUpload(files[i]);
            }
        };
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }

    function resizeAndUpload(file) {
        var reader = new FileReader();
        reader.onloadend = function() {

            var tempImg = new Image();
            tempImg.src = reader.result;
            tempImg.onload = function() {

                var MAX_WIDTH = 320;
                var MAX_HEIGHT = 240;
                var tempW = tempImg.width;
                var tempH = tempImg.height;
                if (tempW > tempH) {
                    if (tempW > MAX_WIDTH) {
                        tempH *= MAX_WIDTH / tempW;
                        tempW = MAX_WIDTH;
                    }
                } else {
                    if (tempH > MAX_HEIGHT) {
                        tempW *= MAX_HEIGHT / tempH;
                        tempH = MAX_HEIGHT;
                    }
                }

                var canvas = document.createElement('canvas');
                canvas.width = tempW;
                canvas.height = tempH;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(this, 0, 0, tempW, tempH);
                var dataURL = canvas.toDataURL("image/jpeg");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(ev){
                    document.getElementById('filesInfo').innerHTML = 'Done!';
                };

                xhr.open('POST', 'uploadResized.php', true);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var data = 'image=' + dataURL;
                xhr.send(data);
            }

        }
        reader.readAsDataURL(file);

    }

    function fileSelect(evt) {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            var files = evt.target.files;

            var result = '';
            var file;
            for (var i = 0; file = files[i]; i++) {
                // if the file is not an image, continue
                if (!file.type.match('image.*')) {
                    continue;
                }

                reader = new FileReader();
                reader.onload = (function (tFile) {
                    return function (evt) {
                        var div = document.createElement('div');
                        div.innerHTML = '<img style="width: 90px;" src="' + evt.target.result + '" />';
                        document.getElementById('filesInfo').appendChild(div);
                    };
                }(file));
                reader.readAsDataURL(file);
            }
        } else {
            alert('The File APIs are not fully supported in this browser.');
        }
    }

    document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
</script>