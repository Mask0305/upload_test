<!DOCTYPE html>
<html>
<head>
    <title>後台 學校</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('bower/bootstrap/dist/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset('css/animate.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css"/>
    <script type="text/javascript" src="<?php echo asset('bower/jquery/dist/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('bower/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- 引入EasyUI -->
    <script type="text/javascript" src="<?php echo asset('bower/easyui/jquery.easyui.min.js'); ?>"></script>
    <!-- 引入EasyUI中文包 -->
    <script type="text/javascript" src="bower/easyui/locale/easyui-lang-zh_TW.js"></script>
    <!-- 引入EasyUI的css-->
    <link rel="stylesheet" href="bower/easyui/themes/default/easyui.css" type="text/css"/>
    <!-- 引入EasyUI的icon文件-->
    <link rel="stylesheet" href="bower/easyui/themes/icon.css" type="text/css"/>
    <!-- 引入EasyUI的color.css文件-->
    <link rel="stylesheet" href="bower/easyui/themes/color.css" type="text/css"/>

    <style>
        body{
            font-family:'微軟正黑體';
            background-color: #f8fafc;
        }
        .navbar-default{
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }
    </style>
</head>
<body>
    <main class="py-4">
        <div class="container">
            <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px" 
            url="{{ route('SchoolController@schools') }}" toolbar="#toolbar" pagination="true" 
            rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                    <tr>
                        <th field="schoolId" width="50">學校id</th>
                        <th field="schoolCode" width="50">學校代碼</th>
                        <th field="isPrivate" width="50">私立公立</th>
                        <th field="schoolName" width="50">學校名稱</th>
                        <th field="searchCount" width="50">搜尋次數</th>
                    </tr>
                </thead>
            </table>
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">新增</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">編輯</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">刪除</a>
            </div>
            
            <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
                <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                    <h3>學校資訊</h3>
                    <div style="margin-bottom:10px">
                        <input name="schoolId" class="easyui-textbox" required="true" label="學校id:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="schoolCode" class="easyui-textbox" required="true" label="學校代碼:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="isPrivate" class="easyui-textbox" required="true" label="私立公立:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="schoolName" class="easyui-textbox" required="true" label="學校名稱:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="searchCount" class="easyui-textbox" required="true" label="搜尋次數:" style="width:100%">
                    </div>
                </form>
            </div>
            <div id="dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
            </div>

        </div>
    </main>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'save_user.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
                    if (r){
                        $.post('destroy_user.php',{id:row.id},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
</body>
</html>