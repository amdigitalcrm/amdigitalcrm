<?php 
if(Session::exist()){
    ?>
<script>
    window.location.href = "<?php echo URL;?>Cpanel/Home";
</script>
<?php
}else{

}
?>