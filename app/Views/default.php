<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if (isset($data['js_files'])) {
    foreach ($data['css_files'] as $file):

    ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php
endforeach;
}
?>
    <title>
        <?php 
            if(isset($data['title'])) 
            {
                echo $data['title'];
            }
        ?>
    </title>
</head>
<body>



<?= $menu; ?>

<?php foreach($data['errors'] as $error) { ?>
        <div  class="errors_validation">   
            <?php echo $error;?>
        </div>
<?php } ?>

	<div style='height: 30px;'></div>
    <div style="padding: 10px">

<?php

if(isset($data['folder']))
{
    print_r('<div class="folder"><a class="btnFolder" href="'.base_url().'/TaskList/taskFolder">Folders</a><p>>'.$data['folder'].'</p></div>');
}
if (isset($data['output'])) {
    echo $data['output'];
}
?>

    </div>
    <?php if (isset($data['js_files'])) {
    foreach ($data['js_files'] as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
}?>
<style>
.errors_validation{
    color:red;
    padding: 50px 0 0 10px ;

}
th[aria-label="Completed: activate to sort column descending"],[aria-label="Completed: activate to sort column ascending"]{
    width: 5% !important;
}
.folder{
    display:flex;
}
.btnFolder{
    margin:auto 2px;
}
.checkbox{
    -webkit-appearance: none;
	background-color: #fafafa;
	border: 1px solid #cacece;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 3px;
	display: inline-block;
	position: relative;
}
.checkbox:checked{
    background-color: #f19f3c;
	border: 1px solid #f19f3c;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
	color: #f19f3c;
}
.checkbox:checked:after{
    content: '\2714';
	font-size: 14px;
	position: absolute;
	top: 0px;
	left: 3px;
	color: #fff;
}
.datatables div.form-div textarea:hover, .datatables div.form-div textarea:focus, .datatables div.form-div input[type="text"]:hover, .datatables div.form-div input[type="text"]:focus, .datatables div.form-div select:hover, .datatables div.form-div select:focus{
    width: 290px;
}
</style>
<script>
    $(document).on('ready', function(){

        $('.completed').click(function () {
            var taskname = jQuery(this).parent().next().html()
            var foldername = jQuery(this).parent().next().next().children().html()
            var check = this.checked
             console.log(taskname)
             console.log(foldername)
             console.log(check)
        $.ajax({
            async: false,
            method: "GET",
            url: "<?php echo base_url().'/TaskList/saveCheck/'?>"+taskname+"/"+check+"/"+foldername,
        }).done(function (total) 
        {

        })
    })
})
</script>
</body>
</html>
