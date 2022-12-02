<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="page">
    <div class="pageHeader">
        <div class="title">Dashboard</div>
        <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe</span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
    </div>
    <div class="main">
        <div class="nav">
            <div class="searchbox">
                <div><i class="fa fa-search"></i>
                    <input type="search" placeholder="Search"/>
                </div>
            </div>
            <div class="menu">
                <div class="title">Folders</div>
                <ul class="folder-list">
                    <li class="<?= isset($_GET['folder_id']) ? '' : 'active' ?> all-task"> <i class="fa fa-folder"></i>All Tasks</li>
                    <?php
                    foreach ($folders as $folder){
                        $currentFolder = '';
                        if (!empty($_GET['folder_id']) && ($_GET['folder_id'] === $folder->id)) {
                            $currentFolder = 'active';
                        } else {
                            $currentFolder = '';
                        }
                        ?>
                       <li class="<?= $currentFolder ?>">
                           <a href="?folder_id=<?=$folder->id?>" ><i class="fa fa-folder"></i><?= $folder->name ?></a>
                           <a href="?delete_folder=<?=$folder->id?>" onclick="return confirm('Are You Sure Delete This Task?')" ><i class="fa fa-trash-alt"></i></a>
                       </li>
                        <?php
                     }
                     ?>
                </ul>
            </div>
            <div >
                <input style="margin-left: 18px;width: 65%;" type="text" id="addFolderInput" placeholder="Add New Folder"/>
                <button id="addFolderBtn" class="btn clickable">+</button>
            </div>
        </div>
        <div class="view">
            <div class="viewHeader">
                <div class="title">
                        <input style="margin-left: 0; width: 100%; line-height: 30px; margin-top: 3%;" type="text" id="TaskNameInput" placeholder="Add New Task">
                </div>
                <div class="functions">
                    <div class="button active">Add New Task</div>
                    <div class="button">Completed</div>
                    <div class="button inverz"><i class="fa fa-trash-alt"></i></div>
                </div>
            </div>
            <div class="content">
                <div class="list">
                    <div class="title">Tasks</div>
                    <ul>
                        <?php if (sizeof($tasks)) {?>
                               <?php foreach ($tasks as $task){?>
                                    <li class="<?= $task->is_done ? 'checked' : '' ; ?>">
                                        <i class=" <?= $task->is_done ? 'fa-solid fa-check' : 'fa-thin fa-square' ; ?>"></i>
                                        <span><?= $task->title;?></span>
                                        <div class="info">
                                            <span class="created_at">Created At <?= $task->created_at ?></span><a href="?delete_task=<?=$task->id?>" onclick="return confirm('Are You Sure Delete This Task?\n<?= $task->title ?>')" ><i class="fa fa-trash-alt"></i></a>
                                        </div>
                                    </li>
                        <?php
                        } ?>
                        <?php
                        } else {?>
                           <li>No Task Available For This Folder ! </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jQuery.js"></script>
<script src="assets/js/script.js"></script>
<script>
    $(document).ready(function (){
        $('#addFolderBtn').click(function (){
            var input = $('input#addFolderInput');
            $.ajax({
                url : "process/ajaxHandler.php",
                method : "POST",
                data : {action: "addFolder", folderName: input.val()},
                success : function (response){
                    if(response = '1'){
                        $('<li><a href="#"><i class="fa fa-folder"></i>'+input.val()+'</a><a><i class="fa fa-trash-alt"></i></a></li>').appendTo("ul.folder-list");
                    }else {
                        alert(response)
                    }
                },
            })
        });

        $('#TaskNameInput').keypress(function (e){
            e.stopPropagation();
            if(e.which == 13){
                $.ajax({
                    url : "process/ajaxHandler.php",
                    method : "POST",
                    data : {action: "addTask", folderId :<?= $_GET['folder_id'] ?> ,taskTitle: $('#TaskNameInput').val()},
                    success : function (response){
                        if (response = '1'){
                            location.reload();
                        }else {
                            alert(response);
                        }
                    },
                })
            }
        })
        $('#TaskNameInput').focus();
        })
</script>
</body>
</html>