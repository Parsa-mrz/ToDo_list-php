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
                    <?php
                    foreach ($folders as $folder){?>
                       <li>
                           <a href="?folder_id=<?=$folder->id?>" ><i class="fa fa-folder"></i><?= $folder->name ?></a>
                           <a href="?delete_folder=<?=$folder->id?>" ><i class="fa fa-trash-alt"></i></a>
                       </li>
                        <?php
                    }
                    ?>
                    <li class="active"> <i class="fa fa-folder"></i>Home</li>

                </ul>
            </div>
            <div >
                <input style="margin-left: 18px;width: 65%;" type="text" id="addFolderInput" placeholder="Add New Folder"/>
                <button id="addFolderBtn" class="btn clickable">+</button>
            </div>
        </div>
        <div class="view">
            <div class="viewHeader">
                <div class="title">Manage Tasks</div>
                <div class="functions">
                    <div class="button active">Add New Task</div>
                    <div class="button">Completed</div>
                    <div class="button inverz"><i class="fa fa-trash-o"></i></div>
                </div>
            </div>
            <div class="content">
                <div class="list">
                    <div class="title">Today</div>
                    <ul>
                        <li class="checked"><i class="fa fa-check-square-o"></i><span>Update team page</span>
                            <div class="info">
                                <div class="button green">In progress</div><span>Complete by 25/04/2014</span>
                            </div>
                        </li>
                        <li><i class="fa fa-square-o"></i><span>Design a new logo</span>
                            <div class="info">
                                <div class="button">Pending</div><span>Complete by 10/04/2014</span>
                            </div>
                        </li>
                        <li><i class="fa fa-square-o"></i><span>Find a front end developer</span>
                            <div class="info"></div>
                        </li>
                    </ul>
                </div>
                <div class="list">
                    <div class="title">Tomorrow</div>
                    <ul>
                        <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
                            <div class="info"></div>
                        </li>
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
                        $('<li><a href="?folder_id=<?=$folder->id?>"><i class="fa fa-folder"></i>'+input.val()+'</a><a href="?delete_folder=<?=$folder->id?>"><i class="fa fa-trash-alt"></i></a></li>').appendTo("ul.folder-list");
                    }else {
                        alert(response)
                    }
                },
            }) });
        })
</script>
</body>
</html>