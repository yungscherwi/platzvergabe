<?php $MatrNr = ["21432425", "21452523", "11521342"];
?>

<script type="text/javascript">
    var jArray= <?php echo json_encode($MatrNr ); ?>;
    for(var i=0;i<jArray.length;i++){
        alert(jArray[i]);
    }
 </script>
